<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInsuranceClaimRequest;
use App\Http\Requests\UpdateInsuranceClaimRequest;
use App\Models\InsuranceClaim;

class InsuranceClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insuranceClaim.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInsuranceClaimRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInsuranceClaimRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InsuranceClaim  $insuranceClaim
     * @return \Illuminate\Http\Response
     */
    public function show(InsuranceClaim $insuranceClaim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InsuranceClaim  $insuranceClaim
     * @return \Illuminate\Http\Response
     */
    public function edit(InsuranceClaim $insuranceClaim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInsuranceClaimRequest  $request
     * @param  \App\Models\InsuranceClaim  $insuranceClaim
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInsuranceClaimRequest $request, InsuranceClaim $insuranceClaim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InsuranceClaim  $insuranceClaim
     * @return \Illuminate\Http\Response
     */
    public function destroy(InsuranceClaim $insuranceClaim)
    {
        //
    }
}
