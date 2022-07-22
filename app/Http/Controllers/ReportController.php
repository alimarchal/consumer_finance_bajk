<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function branchWisePosition(Request $request)
    {


        $month_date = null;
        $zone_data = null;

        if ($request->input('zone')) {
            $zone_data = $request->zone;
        } else {
            $zone_data = 'Muzaffarabad';
        }

        if ($request->input('month')) {
            $month_date = Carbon::parse($request->month);
        } else {
            $month_date = Carbon::parse($request->month);
        }

        $month = Carbon::parse($request->month);
        $previous_month = Carbon::parse($request->month)->subMonth();
        $last_year = Carbon::parse($request->month)->startOfYear()->subMonth();


        $branches = Branch::where('zone', $zone_data)->get();
//        dd($zone_data);
        $branches_array = Branch::where('zone', $zone_data)->pluck('id')->toArray();

        $branch_wise_principal_outstanding = DB::table('customers')
            ->select('branch_id', 'principle_amount', DB::raw("SUM(principle_amount) as principle_amount"))
            ->whereIn('branch_id', $branches_array)
            ->groupBy('branch_id')
            ->get();

        $principal_outstanding_previous_month = DB::table('branch_outstandings')
            ->select('branch_id', 'branch_outstanding_balance', DB::raw("SUM(branch_outstanding_balance) as branch_outstanding_balance"))
            ->whereIn('branch_id', $branches_array)
            ->whereBetween('created_at', [$previous_month->startOfMonth()->format('Y-m-d') . ' 00:00:00.000000', $previous_month->endOfMonth()->format('Y-m-d') . ' 23:59:59.000000'])
            ->groupBy('branch_id')
            ->get();

        DB::enableQueryLog();
        $principal_outstanding_last_year = DB::table('branch_outstandings')
            ->select('branch_id', 'branch_outstanding_balance', DB::raw("SUM(branch_outstanding_balance) as branch_outstanding_balance"))
            ->whereIn('branch_id', $branches_array)
            ->whereBetween('created_at', [$last_year->startOfMonth()->format('Y-m-d') . ' 00:00:00.000000', $last_year->endOfMonth()->format('Y-m-d') . ' 23:59:59.000000'])
            ->groupBy('branch_id')
            ->get();

//        dd(DB::getQueryLog($principal_outstanding_last_year));

        $data = [];
        $data_last_year = [];
        foreach ($branches as $branch) {
            $data[$branch->id] = [$month->format('F') => 0.00, $last_year->format('F') => 0.00, $previous_month->format('F') => 0.00,];
        }
        foreach ($branch_wise_principal_outstanding as $bo) {
            $data[$bo->branch_id][$month->format('F')] = $bo->principle_amount;
        }

        foreach ($principal_outstanding_last_year as $bo) {
            $data[$bo->branch_id][$last_year->format('F')] = $bo->branch_outstanding_balance;
        }
        foreach ($principal_outstanding_previous_month as $bo) {
            $data[$bo->branch_id][$previous_month->format('F')] = $bo->branch_outstanding_balance;
        }

//        dd($last_year);


        return view('reports.index', compact('data', 'last_year', 'previous_month', 'month'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
