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


    <form method="get" action="{{route('report.branch-wise-position')}}">
        <div class="filters" style="display:none;">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="month">Month</label>
                    <input type="date" class="form-control" id="month" name="month" value="{{ empty(request()->date) ? '' : request()->date }}">
                </div>


                <div class="col-md-3">
                    <label for="zone"><strong>Region</strong></label>
                    <select class="form-control select2bs4" id="region" style="width: 100%;" name="region">
                        <option value="">None</option>
                        @foreach(\App\Models\Branch::groupBy('region')->get() as $branch)
                            <option value="{{$branch->region}}">{{$branch->region}}</option>
                        @endforeach

                    </select>
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
        <br> Branch Wise Position - Advances ({{$month->format('F - Y')}})
    </h5>


    <br>
    @php
        $first_amount = 0;
        $first_percentage = 0;

        $second_amount = 0;
        $second_percentage = 0;

        $third_amount = 0;
        $third_percentage = 0;

        $target = 0;
    @endphp
    <table class="table table-bordered  ">
        <thead>
        <tr>
            <th scope="col" class="align-middle text-center" rowspan="3" width="5%">S.No</th>
            <th scope="col" class="align-middle text-center" rowspan="3" width="25%">Branch Name</th>
            <th scope="col" class="align-middle text-center" colspan="3">Advances</th>
            <th scope="col" class="align-middle text-center" colspan="7">Variance Analysis</th>
        </tr>
        <tr>
            <th scope="col" class="align-middle text-center" width="10%">Base:<br> {{$last_year->format('F Y')}}</th>
            <th scope="col" class="align-middle text-center" width="10%">{{$previous_month->format('F Y')}}</th>
            <th scope="col" class="align-middle text-center" width="10%">{{$month->format('F Y')}}</th>
            <th scope="col" class="align-middle text-center" width="10%">Target<br>{{$month->format('F Y')}}</th>
            <th scope="col" class="align-middle text-center" width="10%" colspan="2">
                {{$month->format('F Y')}} <br>
                vs <br>
                Base {{$last_year->format('F Y')}}
            </th>
            <th scope="col" class="align-middle text-center" width="10%" colspan="2">
                {{$month->format('F Y')}} <br>
                vs <br>
                {{$previous_month->format('F Y')}}
            </th>
            <th scope="col" class="align-middle text-center" width="10%" colspan="2">
                {{$month->format('F Y')}} <br>
                vs <br>
                Target<br>{{$month->format('F Y')}}
            </th>
        </tr>

        <tr>
            <th scope="col" class="align-middle text-center">Amount</th>
            <th scope="col" class="align-middle text-center">Amount</th>
            <th scope="col" class="align-middle text-center">Amount</th>


            <th scope="col" class="align-middle text-center">Amount</th>
            <th scope="col" class="align-middle text-center">%</th>
            <th scope="col" class="align-middle text-center">Amount</th>
            <th scope="col" class="align-middle text-center">%</th>
            <th scope="col" class="align-middle text-center">Amount</th>
            <th scope="col" class="align-middle text-center">%</th>
            <th scope="col" class="align-middle text-center">Amount</th>
        </tr>
        </thead>
        <tbody>
        @php $i = 1; @endphp
        @foreach($data as $key => $value)
            <tr>
                <td class="text-center"><strong>{{$i}}</strong></td>
                <td>{{\App\Models\Branch::find($key)->name}}</td>
                <td class="text-right">{{number_format($value[$last_year->format('F')],2)}}</td>
                <td class="text-right">{{number_format($value[$previous_month->format('F')],2)}}</td>
                <td class="text-right">{{number_format($value[$month->format('F')],2)}}</td>
                <td class="text-right">
                    {{number_format($value[$month->format('F') . ' - Target'],2)}}
                    @php
                        $target = $target + $value[$month->format('F') . ' - Target'];
                    @endphp
                </td>

                <td class="text-right">
                    @if($value[$month->format('F')] > 0 && $value[$last_year->format('F')] > 0)
                        {{ number_format($value[$month->format('F')] - $value[$last_year->format('F')], 2) }}
                        @php
                            $first_amount = $first_amount + $value[$month->format('F')] - $value[$last_year->format('F')];
                        @endphp
                    @else
                        0.00
                    @endif
                </td>

                <td class="text-right">
                    @if($value[$month->format('F')] > 0 && $value[$last_year->format('F')] > 0)
                        {{ number_format(($value[$month->format('F')] / $value[$last_year->format('F')] * 100) - 100, 2) }}%
                        @php
                            $first_percentage = $first_percentage + ($value[$month->format('F')] / $value[$last_year->format('F')] * 100) - 100;
                        @endphp
                    @else

                        0.00%
                    @endif
                </td>




                <td class="text-right">
                    @if($value[$month->format('F')] > 0 && $value[$previous_month->format('F')] > 0)
                        {{ number_format($value[$month->format('F')] - $value[$previous_month->format('F')], 2) }}
                        @php
                            $second_amount = $second_amount + $value[$month->format('F')] - $value[$previous_month->format('F')];
                        @endphp
                    @else
                        0.00
                    @endif
                </td>

                <td class="text-right">
                    @if($value[$month->format('F')] > 0 && $value[$previous_month->format('F')] > 0)
                        {{ number_format(($value[$month->format('F')] / $value[$previous_month->format('F')] * 100) - 100, 2) }}%
                        @php
                            $second_percentage = $second_percentage + ($value[$month->format('F')] / $value[$previous_month->format('F')] * 100) - 100;
                        @endphp
                    @else
                        0.00%
                    @endif
                </td>


                <td class="text-right">
                    @if($value[$month->format('F')] > 0 && $value[$month->format('F') . ' - Target'] > 0)
                        {{ number_format($value[$month->format('F')] - $value[$month->format('F') . ' - Target'], 2) }}
                        @php
                            $third_amount = $third_amount + $value[$month->format('F')] - $value[$month->format('F') . ' - Target'];
                        @endphp
                    @else
                        0.00
                    @endif
                </td>

                <td class="text-right">
                    @if($value[$month->format('F')] > 0 && $value[$month->format('F') . ' - Target'] > 0)
                        {{ number_format(($value[$month->format('F')] / $value[$month->format('F') . ' - Target'] * 100) - 100, 2) }}%
                        @php
                            $third_percentage = $third_percentage + ($value[$month->format('F')] / $value[$month->format('F') . ' - Target'] * 100) - 100;
                        @endphp
                    @else
                        0.00%
                    @endif
                </td>

            </tr>
            @php $i++; @endphp
        @endforeach
        <tr>
            <td class="align-middle text-center" colspan="2"><strong>{{$zone_data}} - Total (Amount In Million)</strong></td>
            <td class="align-middle text-center"><strong>{{number_format(($data_total[$last_year->format('F')]/1000000),3)}}</strong></td>
            <td class="align-middle text-center"><strong>{{number_format(($data_total[$previous_month->format('F')]/1000000),3)}}</strong></td>
            <td class="align-middle text-center"><strong>{{number_format(($data_total[$month->format('F')]/1000000),3)}}</strong></td>

            <td class="align-middle text-center"><strong>{{number_format($target,2)}}</strong></td>
            <td class="align-middle text-center"><strong>{{number_format($first_amount,2)}}</strong></td>
            <td class="align-middle text-center"><strong>{{number_format($first_percentage,2)}}</strong></td>
            <td class="align-middle text-center"><strong>{{number_format($second_amount,2)}}</strong></td>
            <td class="align-middle text-center"><strong>{{number_format($second_percentage,2)}}</strong></td>
            <td class="align-middle text-center"><strong>{{number_format($third_amount,2)}}</strong></td>
            <td class="align-middle text-center"><strong>{{number_format($third_percentage,2)}}</strong></td>

        </tr>

        </tbody>


    </table>
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
