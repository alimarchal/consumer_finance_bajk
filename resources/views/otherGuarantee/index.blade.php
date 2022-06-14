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
            <div class="col-md-4 mb-2">
                <label><strong>Primary</strong></label>
                <input type="text" class="form-control" id="validationCustom43" title=""
                       name="customer[other_than_personal_guarantee_primary]">
            </div>
            <div class="col-md-4 mb-3">
                <label><strong>Secondary</strong></label>
                <input type="text" class="form-control" id="validationCustom44" title=""
                       name="customer[other_than_personal_guarantee_secondary]">
            </div>
            <div class="col-md-4 mb-">
                <label><strong>Type of Security</strong></label>
                <input type="text" class="form-control" id="validationCustom45" title=""
                       name="customer[other_than_personal_guarantee_type_of_security]">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-2">
                <label><strong>FSV</strong></label>
                <input type="text" class="form-control" id="validationCustom46" title=""
                       name="customer[other_than_personal_guarantee_fsv]">
            </div>
            <div class="col-md-6 mb-3">
                <label><strong>Ownership</strong></label>
                <input type="text" class="form-control" id="validationCustom47" title=""
                       name="customer[other_than_personal_guarantee_ownership]">
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Save & Next</button>
    </form>

    <h2 class="text-center">Other Than Personal Guarantee Primary</h2>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Primary</th>
            <th scope="col">Secondary</th>
            <th scope="col">Type of Security </th>
            <th scope="col">FSV</th>
            <th scope="col">Ownership</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
        </tr>
        </tbody>
    </table>

@endsection
