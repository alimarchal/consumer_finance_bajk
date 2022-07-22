<?php

namespace App\Console;

use App\Models\BranchOutstanding;
use App\Models\BranchOutstandingDaily;
use App\Models\Insurance;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//         $schedule->command('hello:world')->everyFiveMinutes();
        $schedule->call(function () {
            DB::beginTransaction();
            try {
                $branches_ids = DB::table('customers')
                    ->select('branch_id', 'principle_amount', DB::raw("SUM(principle_amount) as principle_amount"))
                    ->groupBy('branch_id')
                    ->pluck('branch_id')->toArray();
                $branch_outstanding_today = BranchOutstandingDaily::whereDate('created_at', Carbon::today())->get();

                if ($branch_outstanding_today->isNotEmpty()) {
                    $collection = DB::table('customers')
                        ->select('branch_id', 'principle_amount', DB::raw("SUM(principle_amount) as principle_amount"))
                        ->groupBy('branch_id')
                        ->get();
                    foreach ($branches_ids as $key) {
                        if ($branch_outstanding_today->where('branch_id', $key)->first()) {
                            $item = $collection->where('branch_id', $key)->first();
                            $record = $branch_outstanding_today->where('branch_id', $key)->first();
                            $record->branch_id = $item->branch_id;
                            $record->principle_outstanding = $item->principle_amount;
                            $record->save();

                        } else {
                            $item = $collection->where('branch_id', $key)->first();
                            BranchOutstandingDaily::create([
                                'branch_id' => $item->branch_id,
                                'principle_outstanding' => $item->principle_amount,
                            ]);
                        }
                    }
                } else {
                    $collection = DB::table('customers')
                        ->select('branch_id', 'principle_amount', DB::raw("SUM(principle_amount) as principle_amount"))
                        ->groupBy('branch_id')
                        ->get();
                    foreach ($collection as $item) {
                        BranchOutstandingDaily::create([
                            'branch_id' => $item->branch_id,
                            'principle_outstanding' => $item->principle_amount,
                        ]);
                    }
                }
                DB::commit();
                // all good
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
