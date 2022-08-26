<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBranchTargetRequest;
use App\Http\Requests\UpdateBranchTargetRequest;
use App\Models\BranchTarget;

class BranchTargetController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBranchTargetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBranchTargetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BranchTarget  $branchTarget
     * @return \Illuminate\Http\Response
     */
    public function show(BranchTarget $branchTarget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BranchTarget  $branchTarget
     * @return \Illuminate\Http\Response
     */
    public function edit(BranchTarget $branchTarget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBranchTargetRequest  $request
     * @param  \App\Models\BranchTarget  $branchTarget
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBranchTargetRequest $request, BranchTarget $branchTarget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BranchTarget  $branchTarget
     * @return \Illuminate\Http\Response
     */
    public function destroy(BranchTarget $branchTarget)
    {
        //
    }
}
