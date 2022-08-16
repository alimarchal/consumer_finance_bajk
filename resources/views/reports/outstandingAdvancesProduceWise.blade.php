@extends('theme.main')
@section('mainTitle')

@endsection
@section('breadcrumb')
    Borrowers
@endsection

@section('customHeaderScripts')
    {{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css"  rel="stylesheet"/>--}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" defer></script>--}}
    {{--<link rel="stylesheet" href="{{url('AdminLTE/plugins/select2/css/select2.min.css')}}">--}}
    {{--<link rel="stylesheet" href="{{url('AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">--}}
    <style>

        @media print {
            .table thead tr td, .table tbody tr td {
                border-width: 1px !important;
                border-style: solid !important;
                border-color: black !important;
                /*padding:0px;*/
                -webkit-print-color-adjust: exact;
            }

            table.table-bordered > thead > tr > th {
                border: 1px solid #000 !important;
            }

            .rows-print-as-pages {
                page-break-before: always !important;
            }

        }


        @media screen {
            table.table-bordered {
                border: 1px solid #000;
            }

            table.table-bordered > thead > tr > th {
                border: 1px solid #000;
            }

            table.table-bordered > tbody > tr > td {
                border: 1px solid #000;
            }
        }

    </style>
@endsection

@section('body')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif


    <form method="get" action="{{route('report.creditGrowth')}}">
        <div class="filters" style="display:none;">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="month">Month</label>
                    <input type="date" class="form-control" id="month" name="month" value="{{ empty(request()->date) ? '' : request()->date }}">
                </div>

            </div>


            <div class="form-row">
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <button type="button" class="btn btn-danger hideModule" data-target="filters">Hide Filters
                    </button>
                </div>
            </div>
        </div>
        <div class="row d-print-none">
            <div class="col-md-12 p-3">
                <a href="javascript:;" class="btn btn-primary showModule float-right" data-target="filters">
                    Show Filters</a>
                {{--                <input type="submit" name="search" value="Export" class="btn btn-success float-right mr-2">--}}
            </div>
        </div>
    </form>
    {{--sss | {{ request()->input('filter[search_string]', old('filter[search_string]')) }}--}}

    <img class="w-48 h-auto" src="{{Storage::url('logo.png')}}" alt="Bank AJK Logo">
    <div class="col-md-12 d-print-none">
        <button onclick="window.print()" class="btn btn-success d-print-none float-right">
            <i class="fa fa-print" aria-hidden="true"></i>
        </button>
    </div>
    <h5 class="text-center font-weight-bold">The Bank of Azad Jammu & Kashmir
        <br> Summary of Outstanding Advances - Product Wise ({{$month->format('F - Y')}})
    </h5>
    <br>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col" class="align-middle text-center" rowspan="3" width="0.1%">S.No</th>
            <th scope="col" class="align-middle text-center" rowspan="3" width="20%">Advances Category</th>
            <th scope="col" class="align-middle text-center" colspan="6">North Region</th>
            <th scope="col" class="align-middle text-center" colspan="6">South Region</th>
            <th scope="col" class="align-middle text-center" colspan="2" rowspan="2">Total</th>
        </tr>

        <tr>
            <th scope="col" class="align-middle text-center" colspan="2">Muzaffarabad Zone</th>
            <th scope="col" class="align-middle text-center" colspan="2">Rawalakot Zone</th>
            <th scope="col" class="align-middle text-center" colspan="2">Sub - Total</th>
            <th scope="col" class="align-middle text-center" colspan="2">Mirpur Zone</th>
            <th scope="col" class="align-middle text-center" colspan="2">Kotli Zone</th>
            <th scope="col" class="align-middle text-center" colspan="2">Sub - Total</th>
        </tr>
        <tr>
            <th scope="col" class="align-middle text-center">A/C</th>
            <th scope="col" class="align-middle text-center">Amount</th>
            <th scope="col" class="align-middle text-center">A/C</th>
            <th scope="col" class="align-middle text-center">Amount</th>
            <th scope="col" class="align-middle text-center">A/C</th>
            <th scope="col" class="align-middle text-center">Amount</th>
            <th scope="col" class="align-middle text-center">A/C</th>
            <th scope="col" class="align-middle text-center">Amount</th>
            <th scope="col" class="align-middle text-center">A/C</th>
            <th scope="col" class="align-middle text-center">Amount</th>
            <th scope="col" class="align-middle text-center">A/C</th>
            <th scope="col" class="align-middle text-center">Amount</th>
            <th scope="col" class="align-middle text-center">A/C</th>
            <th scope="col" class="align-middle text-center">Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $key => $value)

            @if($key == "Consumer Finance")
                <tr>
                    <td colspan="16"><strong>{{$key}}</strong></td>
                </tr>

                @php $i = 1; $total_count = count($data['Consumer Finance']); @endphp
                @foreach($value as $k => $v)
                    <tr>
                        <td class="text-center">{{$i}}</td>
                        <td class="text-left">{{$k}}</td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Rawalakot']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['no_of_accounts'] + $v['North Region']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['amount'] + $v['North Region']['Rawalakot']['amount']}}
                        </td>


                        <td class="text-right">
                            {{$v['South Region']['Mirpur']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Mirpur']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Kotli']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Kotli']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Mirpur']['no_of_accounts'] + $v['South Region']['Kotli']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Mirpur']['amount'] + $v['South Region']['Kotli']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['no_of_accounts'] + $v['North Region']['Rawalakot']['no_of_accounts'] + $v['South Region']['Mirpur']['no_of_accounts'] + $v['South Region']['Kotli']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['amount'] + $v['North Region']['Rawalakot']['amount'] + $v['South Region']['Mirpur']['amount'] + $v['South Region']['Kotli']['amount']}}
                        </td>

                    </tr>
                    @php $i++; @endphp
                @endforeach

                @if($total_count < $i)
                    <tr class="font-weight-bold text-right">
                        <td colspan="2" class="text-left">Sub Total</td>
                        <td>
                            {{$data_total['Consumer Finance']['Muzaffarabad']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Consumer Finance']['Muzaffarabad']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Consumer Finance']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Consumer Finance']['Rawalakot']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Consumer Finance']['Muzaffarabad']['no_of_accounts'] + $data_total['Consumer Finance']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Consumer Finance']['Muzaffarabad']['amount'] + $data_total['Consumer Finance']['Rawalakot']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Consumer Finance']['Mirpur']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Consumer Finance']['Mirpur']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Consumer Finance']['Kotli']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Consumer Finance']['Kotli']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Consumer Finance']['Mirpur']['no_of_accounts']+$data_total['Consumer Finance']['Kotli']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Consumer Finance']['Mirpur']['amount']+$data_total['Consumer Finance']['Kotli']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Consumer Finance']['Mirpur']['no_of_accounts']+$data_total['Consumer Finance']['Kotli']['no_of_accounts'] + $data_total['Consumer Finance']['Muzaffarabad']['no_of_accounts'] + $data_total['Consumer Finance']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Consumer Finance']['Mirpur']['amount']+$data_total['Consumer Finance']['Kotli']['amount'] + $data_total['Consumer Finance']['Muzaffarabad']['amount'] + $data_total['Consumer Finance']['Rawalakot']['amount']}}
                        </td>
                    </tr>
                @endif
            @endif


            @if($key == "Commercial / SME Finance")
                <tr>
                    <td colspan="16"><strong>{{$key}}</strong></td>
                </tr>

                @php $i = 1; $total_count = count($data['Commercial / SME Finance']); @endphp
                @foreach($value as $k => $v)
                    <tr>
                        <td class="text-center">{{$i}}</td>
                        <td class="text-left">{{$k}}</td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Rawalakot']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['no_of_accounts'] + $v['North Region']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['amount'] + $v['North Region']['Rawalakot']['amount']}}
                        </td>


                        <td class="text-right">
                            {{$v['South Region']['Mirpur']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Mirpur']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Kotli']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Kotli']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Mirpur']['no_of_accounts'] + $v['South Region']['Kotli']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Mirpur']['amount'] + $v['South Region']['Kotli']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['no_of_accounts'] + $v['North Region']['Rawalakot']['no_of_accounts'] + $v['South Region']['Mirpur']['no_of_accounts'] + $v['South Region']['Kotli']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['amount'] + $v['North Region']['Rawalakot']['amount'] + $v['South Region']['Mirpur']['amount'] + $v['South Region']['Kotli']['amount']}}
                        </td>

                    </tr>
                    @php $i++; @endphp
                @endforeach

                @if($total_count < $i)
                    <tr class="font-weight-bold text-right">
                        <td colspan="2" class="text-left">Sub Total</td>
                        <td>
                            {{$data_total['Commercial / SME Finance']['Muzaffarabad']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Commercial / SME Finance']['Muzaffarabad']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Commercial / SME Finance']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Commercial / SME Finance']['Rawalakot']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Commercial / SME Finance']['Muzaffarabad']['no_of_accounts'] + $data_total['Commercial / SME Finance']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Commercial / SME Finance']['Muzaffarabad']['amount'] + $data_total['Commercial / SME Finance']['Rawalakot']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Commercial / SME Finance']['Mirpur']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Commercial / SME Finance']['Mirpur']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Commercial / SME Finance']['Kotli']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Commercial / SME Finance']['Kotli']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Commercial / SME Finance']['Mirpur']['no_of_accounts']+$data_total['Commercial / SME Finance']['Kotli']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Commercial / SME Finance']['Mirpur']['amount']+$data_total['Commercial / SME Finance']['Kotli']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Commercial / SME Finance']['Mirpur']['no_of_accounts']+$data_total['Commercial / SME Finance']['Kotli']['no_of_accounts'] + $data_total['Commercial / SME Finance']['Muzaffarabad']['no_of_accounts'] + $data_total['Commercial / SME Finance']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Commercial / SME Finance']['Mirpur']['amount']+$data_total['Commercial / SME Finance']['Kotli']['amount'] + $data_total['Commercial / SME Finance']['Muzaffarabad']['amount'] + $data_total['Commercial / SME Finance']['Rawalakot']['amount']}}
                        </td>
                    </tr>
                @endif
            @endif


            @if($key == "Micro Finance")
                <tr>
                    <td colspan="16"><strong>{{$key}}</strong></td>
                </tr>

                @php $i = 1; $total_count = count($data['Micro Finance']); @endphp
                @foreach($value as $k => $v)
                    <tr>
                        <td class="text-center">{{$i}}</td>
                        <td class="text-left">{{$k}}</td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Rawalakot']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['no_of_accounts'] + $v['North Region']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['amount'] + $v['North Region']['Rawalakot']['amount']}}
                        </td>


                        <td class="text-right">
                            {{$v['South Region']['Mirpur']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Mirpur']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Kotli']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Kotli']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Mirpur']['no_of_accounts'] + $v['South Region']['Kotli']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Mirpur']['amount'] + $v['South Region']['Kotli']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['no_of_accounts'] + $v['North Region']['Rawalakot']['no_of_accounts'] + $v['South Region']['Mirpur']['no_of_accounts'] + $v['South Region']['Kotli']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['amount'] + $v['North Region']['Rawalakot']['amount'] + $v['South Region']['Mirpur']['amount'] + $v['South Region']['Kotli']['amount']}}
                        </td>

                    </tr>
                    @php $i++; @endphp
                @endforeach

                @if($total_count < $i)
                    <tr class="font-weight-bold text-right">
                        <td colspan="2" class="text-left">Sub Total</td>
                        <td>
                            {{$data_total['Micro Finance']['Muzaffarabad']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Micro Finance']['Muzaffarabad']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Micro Finance']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Micro Finance']['Rawalakot']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Micro Finance']['Muzaffarabad']['no_of_accounts'] + $data_total['Micro Finance']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Micro Finance']['Muzaffarabad']['amount'] + $data_total['Micro Finance']['Rawalakot']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Micro Finance']['Mirpur']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Micro Finance']['Mirpur']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Micro Finance']['Kotli']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Micro Finance']['Kotli']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Micro Finance']['Mirpur']['no_of_accounts']+$data_total['Micro Finance']['Kotli']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Micro Finance']['Mirpur']['amount']+$data_total['Micro Finance']['Kotli']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Micro Finance']['Mirpur']['no_of_accounts']+$data_total['Micro Finance']['Kotli']['no_of_accounts'] + $data_total['Micro Finance']['Muzaffarabad']['no_of_accounts'] + $data_total['Micro Finance']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Micro Finance']['Mirpur']['amount']+$data_total['Micro Finance']['Kotli']['amount'] + $data_total['Micro Finance']['Muzaffarabad']['amount'] + $data_total['Micro Finance']['Rawalakot']['amount']}}
                        </td>
                    </tr>
                @endif
            @endif


            @if($key == "Agriculture Finance")
                <tr>
                    <td colspan="16"><strong>{{$key}}</strong></td>
                </tr>

                @php $i = 1; $total_count = count($data['Agriculture Finance']); @endphp
                @foreach($value as $k => $v)
                    <tr>
                        <td class="text-center">{{$i}}</td>
                        <td class="text-left">{{$k}}</td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Rawalakot']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['no_of_accounts'] + $v['North Region']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['amount'] + $v['North Region']['Rawalakot']['amount']}}
                        </td>


                        <td class="text-right">
                            {{$v['South Region']['Mirpur']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Mirpur']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Kotli']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Kotli']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Mirpur']['no_of_accounts'] + $v['South Region']['Kotli']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['South Region']['Mirpur']['amount'] + $v['South Region']['Kotli']['amount']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['no_of_accounts'] + $v['North Region']['Rawalakot']['no_of_accounts'] + $v['South Region']['Mirpur']['no_of_accounts'] + $v['South Region']['Kotli']['no_of_accounts']}}
                        </td>
                        <td class="text-right">
                            {{$v['North Region']['Muzaffarabad']['amount'] + $v['North Region']['Rawalakot']['amount'] + $v['South Region']['Mirpur']['amount'] + $v['South Region']['Kotli']['amount']}}
                        </td>

                    </tr>
                    @php $i++; @endphp
                @endforeach

                @if($total_count < $i)
                    <tr class="font-weight-bold text-right">
                        <td colspan="2" class="text-left">Sub Total</td>
                        <td>
                            {{$data_total['Agriculture Finance']['Muzaffarabad']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Agriculture Finance']['Muzaffarabad']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Agriculture Finance']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Agriculture Finance']['Rawalakot']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Agriculture Finance']['Muzaffarabad']['no_of_accounts'] + $data_total['Agriculture Finance']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Agriculture Finance']['Muzaffarabad']['amount'] + $data_total['Agriculture Finance']['Rawalakot']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Agriculture Finance']['Mirpur']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Agriculture Finance']['Mirpur']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Agriculture Finance']['Kotli']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Agriculture Finance']['Kotli']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Agriculture Finance']['Mirpur']['no_of_accounts']+$data_total['Agriculture Finance']['Kotli']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Agriculture Finance']['Mirpur']['amount']+$data_total['Agriculture Finance']['Kotli']['amount']}}
                        </td>
                        <td>
                            {{$data_total['Agriculture Finance']['Mirpur']['no_of_accounts']+$data_total['Agriculture Finance']['Kotli']['no_of_accounts'] + $data_total['Agriculture Finance']['Muzaffarabad']['no_of_accounts'] + $data_total['Agriculture Finance']['Rawalakot']['no_of_accounts']}}
                        </td>
                        <td>
                            {{$data_total['Agriculture Finance']['Mirpur']['amount']+$data_total['Agriculture Finance']['Kotli']['amount'] + $data_total['Agriculture Finance']['Muzaffarabad']['amount'] + $data_total['Agriculture Finance']['Rawalakot']['amount']}}
                        </td>
                    </tr>
                @endif
            @endif

        @endforeach


        </tbody>

    </table>



    <br>

@endsection


@section('customFooterScripts')
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            $(document).ready(function () {
                $(".showModule").click(function () {
                    $("." + $(this).data("target")).slideDown("slow");
                    $(this).hide()
                });
                $(".hideModule").click(function () {
                    $("." + $(this).data("target")).slideUp("slow");
                    $('.showModule').show()
                });
            });
            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({icons: {time: 'far fa-clock'}});

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function (event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })

    </script>
@endsection
