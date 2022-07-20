@extends('theme.main')
@section('breadcrumb')
    Borrower Profile / Security
@endsection
@section('body')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form method="post" action="{{route('otherGuarantee.store', $customer->id)}}">
        @csrf
        @include('theme.customer')

        <br>

        <div class="form-row">
            <div class="col-md-3 mb-2">
                <label for="primary"><strong>Primary</strong></label>

                <select class="form-control select2bs4" id="primary" name="primary" required>
                    <option value="">None</option>
                    <option value="Hypothecation">Hypothecation</option>
                    <option value="Lien">Lien</option>
                    <option value="Pledge">Pledge</option>
                    <option value="Mortgage">Mortgage</option>
                    <option value="Mortgage">Personal Guarantee</option>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="secondary"><strong>Secondary</strong></label>
                <input type="text" class="form-control" id="secondary" name="secondary">
            </div>



            <div class="col-md-3 mb-3">
                <label for="ownership"><strong>Ownership</strong></label>
                <input type="text" class="form-control" id="ownership" name="ownership">
            </div>


            <div class="col-md-3 mb-2">
                <label for="market_value"><strong>Market Value</strong></label>
                <input type="number" step="0.01" min="0.00" class="form-control" id="market_value" name="market_value">
            </div>

            <div class="col-md-3 mb-2">
                <label for="fsv"><strong>FSV</strong></label>
                <input type="number" step="0.01" min="0.00" class="form-control" id="fsv" name="fsv">
            </div>



        </div>
        <button class="btn btn-primary float-right" type="submit">Save</button>
        <br>
    </form>

    @if($customer->other_guarantee->isNotEmpty())
        <h2 class="text-center" style="border-top: 1px solid red; border-bottom: 1px solid red; padding: 10px; margin-bottom: 30px; margin-top: 30px;">Security</h2>
        <hr>
        <table class="table table-bordered border-collapse">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Primary</th>
                <th scope="col">Secondary</th>
                <th scope="col">Ownership</th>
                <th scope="col">Market Value</th>
                <th scope="col">FSV</th>
            </tr>
            </thead>

            <tbody>
            @foreach($customer->other_guarantee as $og)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$og->primary}}</td>
                    <td>{{$og->secondary}}</td>
                    <td>{{$og->ownership}}</td>
                    <td>{{$og->market_value}}</td>
                    <td>{{$og->fsv}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endif

@endsection
