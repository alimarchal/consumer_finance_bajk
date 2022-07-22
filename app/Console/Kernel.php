<?php

namespace App\Console;

use App\Models\Insurance;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//         $schedule->command('hello:world')->everyFiveMinutes();
        $schedule->call(function () {
            Insurance::create([
                'customer_id' => 3,
                'insurance_company' => 'ABC',
                'date_of_insurance' => '2022-07-22',
                'insurance_amount' => 100,
                'date_of_expiry_of_insurance' => 3,
            ]);
            info('Hello EveryFiveMinutes');
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
