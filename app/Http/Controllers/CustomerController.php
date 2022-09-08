<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Branch;
use App\Models\BranchOutstanding;
use App\Models\BranchOutstandingDaily;
use App\Models\Customer;
use App\Models\Interest;
use App\Models\ProductWiseDaily;
use App\Models\ProductWiseMonthly;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CustomerController extends Controller
{

    public function dashboard()
    {

        $total_borrower = 0;
        $total_amount_outstanding = 0;
        $total_active_user = 0;
        $consumer_financing_outstanding = 0;
        $commercial_sme_financing = 0;
        $micro_financing = 0;
        $agriculture_financing = 0;
        $consumer_financing_outstanding_noa = 0;
        $commercial_sme_financing_noa = 0;
        $micro_financing_noa = 0;
        $agriculture_financing_noa = 0;

        if (Auth::user()->hasRole(['Credit Officer', 'Branch Manager'])) {

            $total_borrower = Customer::where('branch_id', \auth()->user()->branch_id)->count();
            $total_amount_outstanding = Customer::where('branch_id', \auth()->user()->branch_id)->sum('principle_amount');
            $total_active_user = User::where('branch_id', \auth()->user()->branch_id)->where('status', 'Active')->count();

            $consumer_financing_outstanding = Customer::where('branch_id', \auth()->user()->branch_id)->where('product_id', '1')->sum('principle_amount');
            $commercial_sme_financing = Customer::where('branch_id', \auth()->user()->branch_id)->where('product_id', '2')->sum('principle_amount');
            $micro_financing = Customer::where('branch_id', \auth()->user()->branch_id)->where('product_id', '3')->sum('principle_amount');
            $agriculture_financing = Customer::where('branch_id', \auth()->user()->branch_id)->where('product_id', '4')->sum('principle_amount');

            $consumer_financing_outstanding_noa = Customer::where('branch_id', \auth()->user()->branch_id)->where('product_id', '1')->count();
            $commercial_sme_financing_noa = Customer::where('branch_id', \auth()->user()->branch_id)->where('product_id', '2')->count();
            $micro_financing_noa = Customer::where('branch_id', \auth()->user()->branch_id)->where('product_id', '3')->count();
            $agriculture_financing_noa = Customer::where('branch_id', \auth()->user()->branch_id)->where('product_id', '4')->count();

            $npl_accounts = Customer::where('branch_id', \auth()->user()->branch_id)->where('customers.status', '=', 1)->whereNotIn('customers.customer_status', ['Regular', 'Irregular'])->count();
            $npl_accounts_amount = Customer::where('branch_id', \auth()->user()->branch_id)->where('customers.status', '=', 1)->whereNotIn('customers.customer_status', ['Regular', 'Irregular'])->sum('principle_amount');


        } elseif (Auth::user()->hasRole('South Regional MIS Officer')) {
            $south_branches = Branch::where('region', 'South Region')->get('id');
            $branches = [];
            foreach ($south_branches as $item) {
                $branches[] = $item->id;
            }


            $total_borrower = Customer::whereIn('branch_id', $branches)->count();
            $total_amount_outstanding = Customer::whereIn('branch_id', $branches)->sum('principle_amount');
            $total_active_user = User::whereIn('branch_id', $branches)->where('status', 'Active')->count();
            // Financing Cards
            $consumer_financing_outstanding = Customer::whereIn('branch_id', $branches)->where('product_id', '1')->sum('principle_amount');
            $commercial_sme_financing = Customer::whereIn('branch_id', $branches)->where('product_id', '2')->sum('principle_amount');
            $micro_financing = Customer::whereIn('branch_id', $branches)->where('product_id', '3')->sum('principle_amount');
            $agriculture_financing = Customer::whereIn('branch_id', $branches)->where('product_id', '4')->sum('principle_amount');

            $consumer_financing_outstanding_noa = Customer::whereIn('branch_id', $branches)->where('product_id', '1')->count();
            $commercial_sme_financing_noa = Customer::whereIn('branch_id', $branches)->where('product_id', '2')->count();
            $micro_financing_noa = Customer::whereIn('branch_id', $branches)->where('product_id', '3')->count();
            $agriculture_financing_noa = Customer::whereIn('branch_id', $branches)->where('product_id', '4')->count();


            $npl_accounts = Customer::whereIn('branch_id', $branches)->where('customers.status', '=', 1)->whereNotIn('customers.customer_status', ['Regular', 'Irregular'])->count();
            $npl_accounts_amount = Customer::whereIn('branch_id', $branches)->where('customers.status', '=', 1)->whereNotIn('customers.customer_status', ['Regular', 'Irregular'])->sum('principle_amount');

        } elseif (Auth::user()->hasRole('North Regional MIS Officer')) {

            $north_branches = Branch::where('region', 'North Region')->get('id');
            $branches = [];
            foreach ($north_branches as $item) {
                $branches[] = $item->id;
            }

            $total_borrower = Customer::whereIn('branch_id', $branches)->count();
            $total_amount_outstanding = Customer::whereIn('branch_id', $branches)->sum('principle_amount');
            $total_active_user = User::whereIn('branch_id', $branches)->where('status', 'Active')->count();
            // Financing Cards
            $consumer_financing_outstanding = Customer::whereIn('branch_id', $branches)->where('product_id', '1')->sum('principle_amount');
            $commercial_sme_financing = Customer::whereIn('branch_id', $branches)->where('product_id', '2')->sum('principle_amount');
            $micro_financing = Customer::whereIn('branch_id', $branches)->where('product_id', '3')->sum('principle_amount');
            $agriculture_financing = Customer::whereIn('branch_id', $branches)->where('product_id', '4')->sum('principle_amount');

            $consumer_financing_outstanding_noa = Customer::whereIn('branch_id', $branches)->where('product_id', '1')->count();
            $commercial_sme_financing_noa = Customer::whereIn('branch_id', $branches)->where('product_id', '2')->count();
            $micro_financing_noa = Customer::whereIn('branch_id', $branches)->where('product_id', '3')->count();
            $agriculture_financing_noa = Customer::whereIn('branch_id', $branches)->where('product_id', '4')->count();

            $npl_accounts = Customer::whereIn('branch_id', $branches)->where('customers.status', '=', 1)->whereNotIn('customers.customer_status', ['Regular', 'Irregular'])->count();
            $npl_accounts_amount = Customer::whereIn('branch_id', $branches)->where('customers.status', '=', 1)->whereNotIn('customers.customer_status', ['Regular', 'Irregular'])->sum('principle_amount');

        } elseif (Auth::user()->hasRole(['Head Office', 'Super-Admin'])) {
            $total_borrower = Customer::count();
            $total_amount_outstanding = Customer::sum('principle_amount');
            $total_active_user = User::where('status', 'Active')->count();
            // Financing Cards
            $consumer_financing_outstanding = Customer::where('product_id', '1')->sum('principle_amount');
            $commercial_sme_financing = Customer::where('product_id', '2')->sum('principle_amount');
            $micro_financing = Customer::where('product_id', '3')->sum('principle_amount');
            $agriculture_financing = Customer::where('product_id', '4')->sum('principle_amount');

            $consumer_financing_outstanding_noa = Customer::where('product_id', '1')->count();
            $commercial_sme_financing_noa = Customer::where('product_id', '2')->count();
            $micro_financing_noa = Customer::where('product_id', '3')->count();
            $agriculture_financing_noa = Customer::where('product_id', '4')->count();

            $npl_accounts = Customer::where('customers.status', '=', 1)->whereNotIn('customers.customer_status', ['Regular', 'Irregular'])->count();
            $npl_accounts_amount = Customer::where('customers.status', '=', 1)->whereNotIn('customers.customer_status', ['Regular', 'Irregular'])->sum('principle_amount');

        }


        return view('dashboard',
            compact('total_borrower', 'total_amount_outstanding', 'total_active_user',
                'consumer_financing_outstanding', 'commercial_sme_financing',
                'micro_financing', 'agriculture_financing',
                'consumer_financing_outstanding_noa', 'commercial_sme_financing_noa',
                'micro_financing_noa', 'agriculture_financing_noa','npl_accounts','npl_accounts_amount'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = null;
        if (Auth::user()->hasRole(['Credit Officer', 'Branch Manager'])) {
//            dd(auth()->user()->getRoleNames());
            $customers = QueryBuilder::for(Customer::with('branch', 'product', 'product_type')->where('branch_id', \auth()->user()->branch_id))
                ->allowedFilters([
                    AllowedFilter::scope('search_string'),
                    AllowedFilter::exact('customer_cnic'),
                    AllowedFilter::exact('branch_id'),
                    AllowedFilter::exact('account_cd_saving'),
                    AllowedFilter::exact('gender'),
                    AllowedFilter::exact('manual_account'),
                ])->paginate(10)->withQueryString();
        } elseif (Auth::user()->hasRole('South Regional MIS Officer')) {
            $south_branches = Branch::where('region', 'South Region')->get('id');
            $branches = [];
            foreach ($south_branches as $item) {
                $branches[] = $item->id;
            }

            $customers = QueryBuilder::for(Customer::with('branch', 'product', 'product_type')->whereIn('branch_id', $branches))
                ->allowedFilters([
                    AllowedFilter::scope('search_string'),
                    AllowedFilter::exact('customer_cnic'),
                    AllowedFilter::exact('branch_id'),
                    AllowedFilter::exact('account_cd_saving'),
                    AllowedFilter::exact('gender'),
                    AllowedFilter::exact('manual_account'),
                ])->paginate(10)->withQueryString();
        } elseif (Auth::user()->hasRole('North Regional MIS Officer')) {

            $north_branches = Branch::where('region', 'North Region')->get('id');
            $branches = [];
            foreach ($north_branches as $item) {
                $branches[] = $item->id;
            }

            $customers = QueryBuilder::for(Customer::with('branch', 'product', 'product_type')->whereIn('branch_id', $branches))
                ->allowedFilters([
                    AllowedFilter::scope('search_string'),
                    AllowedFilter::exact('customer_cnic'),
                    AllowedFilter::exact('branch_id'),
                    AllowedFilter::exact('account_cd_saving'),
                    AllowedFilter::exact('gender'),
                    AllowedFilter::exact('manual_account'),
                ])->paginate(10)->withQueryString();
        } elseif (Auth::user()->hasRole(['Head Office', 'Super-Admin'])) {
            $customers = QueryBuilder::for(Customer::with('branch', 'product', 'product_type'))
                ->allowedFilters([
                    AllowedFilter::scope('search_string'),
                    AllowedFilter::exact('customer_cnic'),
                    AllowedFilter::exact('branch_id'),
                    AllowedFilter::exact('account_cd_saving'),
                    AllowedFilter::exact('gender'),
                    AllowedFilter::exact('manual_account'),
                ])->paginate(10)->withQueryString();
        }

        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCustomerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {

        $flag = true;
        DB::beginTransaction();
        try {

            $branch = Branch::find($request->branch_id);
//            $request->merge(['account_cd_saving' => $branch->code . '-' . $request->account_cd_saving]);
            $customer = Customer::create($request->all());

            $interest = Interest::create([
                'customer_id' => $customer->id,
                'date' => Carbon::now()->format('Y-m-d'),
                'kibor' => $request->kibor_rate,
                'bank_spread' => $request->bank_spread_rate,
                'total' => $request->kibor_rate + $request->bank_spread_rate,
            ]);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            $flag = false;
            // something went wrong
        }


        if ($flag) {
            session()->flash('message', 'Borrower successfully created.');
            return to_route('customer.show', $customer->id);
        } else {
            session()->flash('error', 'Something went wrong!.');
            return to_route('customer.show', $customer->id);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    public function profile(Customer $customer)
    {

        return view('customer.profile', compact('customer'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCustomerRequest $request
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
/*
        $account_data = $request->account_cd_saving;
        $account_no_branch = explode("-", $account_data);
        if (count($account_no_branch) > 1) {
            $branch = Branch::find($request->branch_id);
            $request->merge(['account_cd_saving' => $branch->code . '-' . $account_no_branch[1]]);
        } else {
            $branch = Branch::find($request->branch_id);
            $request->merge(['account_cd_saving' => $branch->code . '-' . $account_data]);
        }
*/
        $customer->update($request->all());
        session()->flash('message', 'Borrower successfully updated.');
        return to_route('customer.show', $customer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
