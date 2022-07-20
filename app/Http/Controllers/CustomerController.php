<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Branch;
use App\Models\Customer;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = QueryBuilder::for(Customer::with('branch'))
            ->allowedFilters([
                AllowedFilter::scope('search_string'),
                AllowedFilter::exact('customer_cnic'),
                AllowedFilter::exact('branch_id'),
                AllowedFilter::exact('account_cd_saving'),
                'gender'
            ])->paginate(10)->withQueryString();

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
        $branch = Branch::find($request->branch_id);
        $request->merge(['account_cd_saving' => $branch->code  . '-' . $request->account_cd_saving]);

        $customer = Customer::create($request->all());
        session()->flash('message', 'Borrower successfully created.');
        return to_route('customer.show', $customer->id);
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

        $account_data = $request->account_cd_saving;
        $account_no_branch = explode("-", $account_data);
        if (count($account_no_branch) > 1) {
            $branch = Branch::find($request->branch_id);
            $request->merge(['account_cd_saving' => $branch->code . '-' . $account_no_branch[1]]);
        } else {
            $branch = Branch::find($request->branch_id);
            $request->merge(['account_cd_saving' => $branch->code . '-' . $account_data]);
        }

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
