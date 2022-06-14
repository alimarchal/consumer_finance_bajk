@extends('theme.main')
@section('breadcrumb')
    test
@endsection
@section('body')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form class="needs-validation" novalidate method="post" action="{{url('customer')}}">
        @csrf
        @include('theme.customer')

        <br>

        <div class="form-row">
            <div class="col-md-3 mb-2">
                <label><strong>Insurance Company</strong></label>
                <input type="text" class="form-control" id="validationCustom50" title=""
                       name="customer[insurance_company]">
            </div>
            <div class="col-md-3 mb-3">
                <label><strong>Date of Insurance</strong></label>
                <input type="date" class="form-control" id="validationCustom51" title="" name="customer[insurance_date_of_insurance]">
            </div>
            <div class="col-md-3 mb-2">
                <label><strong>Insurance Amount</strong></label>
                <input type="text" class="form-control" id="validationCustom52" title=""
                       name="customer[insurance_insurance_amount]">
            </div>
            <div class="col-md-3 mb-3">
                <label><strong>Date of Expiry of Insurance</strong></label>
                <input type="date" class="form-control" id="validationCustom53" title=""
                       name="customer[insurance_date_of_expiry_of_insurance]">
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Save & Next</button>
    </form>

    <br>
    <h2 class="text-center">Insurance</h2>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Insurance Company </th>
            <th scope="col">Date of Insurance </th>
            <th scope="col">Insurance Amount </th>
            <th scope="col">Date of Expiry of Insurance </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
        </tr>
        </tbody>
    </table>


@endsection
