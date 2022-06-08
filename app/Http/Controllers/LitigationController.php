<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLitigationRequest;
use App\Http\Requests\UpdateLitigationRequest;
use App\Models\Litigation;

class LitigationController extends Controller
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
        return view('litigation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLitigationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLitigationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Litigation  $litigation
     * @return \Illuminate\Http\Response
     */
    public function show(Litigation $litigation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Litigation  $litigation
     * @return \Illuminate\Http\Response
     */
    public function edit(Litigation $litigation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLitigationRequest  $request
     * @param  \App\Models\Litigation  $litigation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLitigationRequest $request, Litigation $litigation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Litigation  $litigation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Litigation $litigation)
    {
        //
    }
}
