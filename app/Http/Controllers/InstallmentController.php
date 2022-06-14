<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstallmentRequest;
use App\Http\Requests\UpdateInstallmentRequest;
use App\Models\Customer;
use App\Models\Installment;

class InstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer)
    {

        return view('installment.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('installment.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInstallmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstallmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Installment  $installment
     * @return \Illuminate\Http\Response
     */
    public function show(Installment $installment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Installment  $installment
     * @return \Illuminate\Http\Response
     */
    public function edit(Installment $installment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstallmentRequest  $request
     * @param  \App\Models\Installment  $installment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstallmentRequest $request, Installment $installment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Installment  $installment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Installment $installment)
    {
        //
    }
}
