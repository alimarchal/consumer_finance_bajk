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


    <form method="get" action="{{route('report.branchWisePositionLoans')}}">
        <div class="filters" style="display:none;">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="month">Month</label>
                    <input type="date" class="form-control" id="month" name="month" value="{{ empty(request()->date) ? '' : request()->date }}">
                </div>

                <div class="col-md-3">
                    <label for="product_type_id"><strong>Facility Type</strong></label>
                    <select class="form-control select2bs4" id="product_type_id" style="width: 100%;" name="product_type_id">
                        <option value="">None</option>
                        @foreach(\App\Models\ProductType::all() as $pt)
                            <option value="{{$pt->id}}">{{$pt->product_type}}</option>
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
        <br> Branch Wise Position - Advances: {{\App\Models\ProductType::find($product_type_id)->product_type}} ({{$month->format('F - Y')}})
    </h5>
    <br>

    <table class="table table-bordered  ">
        <thead>
        <tr>
            <th scope="col" class="align-middle text-center" rowspan="2" width="0.1%">S.No</th>
            <th scope="col" class="align-middle text-center" rowspan="2">Branch Name</th>
            <th scope="col" class="align-middle text-center">Base:<br>{{$last_year->format('F Y')}}</th>
            <th scope="col" class="align-middle text-center">{{$previous_month->format('F Y')}}</th>
            <th scope="col" class="align-middle text-center">Actual<br>{{$month->format('F Y')}}</th>
            <th scope="col" class="align-middle text-center" colspan="2">{{$last_year->format('F Y')}} <br>vs<br>{{$month->format('F Y')}}</th>
            <th scope="col" class="align-middle text-center" colspan="2">{{$last_year->format('F Y')}} <br>vs<br>{{$previous_month->format('F Y')}}</th>
        </tr>

        <tr>
            <th scope="col" class="align-middle text-center">Amount</th>
            <th scope="col" class="align-middle text-center">Amount</th>
            <th scope="col" class="align-middle text-center">Amount</th>
            <th scope="col" class="align-middle text-center">Amount</th>
            <th scope="col" class="align-middle text-center">%</th>
            <th scope="col" class="align-middle text-center">Amount</th>
            <th scope="col" class="align-middle text-center">%</th>
        </thead>
        <tbody>


        @php
            $kotli_first_month = 0;
            $kotli_second_month = 0;
            $kotli_third_month = 0;

            $muzaffarabad_first_month = 0;
            $muzaffarabad_second_month = 0;
            $muzaffarabad_third_month = 0;

            $rawalakot_first_month = 0;
            $rawalakot_second_month = 0;
            $rawalakot_third_month = 0;

            $mirpur_first_month = 0;
            $mirpur_second_month = 0;
            $mirpur_third_month = 0;

            $kotli_first_month = 0;
            $kotli_second_month = 0;
            $kotli_third_month = 0;
        @endphp

        @foreach($data as $key => $value)

            @if($key == "MUZAFFARABAD")
                <tr>
                    <td colspan="9"><strong>{{$key}}</strong></td>
                </tr>
                @php


                    $i = 1; $total_count = count($data['MUZAFFARABAD']);
                    $first_month = 0;
                    $second_month = 0;
                    $third_month = 0;
                @endphp
                @foreach($value as $k => $v)
                    <tr>
                        <td class="text-center">{{$i}}</td>
                        <td class="text-left">{{$k}}</td>
                        <td class="text-right">{{number_format($v[$last_year->format('F')]['amount'],2)}}</td>
                        <td class="text-right">{{number_format($v[$previous_month->format('F')]['amount'],2)}}</td>
                        <td class="text-right">{{number_format($v[$month->format('F')]['amount'],2)}}</td>
                        <td class="text-right">0</td>
                        <td class="text-right">0.00%</td>
                        <td class="text-right">0</td>
                        <td class="text-right">0.00%</td>
                    </tr>
                    @php
                        $i++;
                        $first_month = $first_month + $v[$month->format('F')]['amount'];
                        $second_month = $second_month + $v[$previous_month->format('F')]['amount'];
                        $third_month = $third_month + $v[$last_year->format('F')]['amount'];

                        $muzaffarabad_first_month = $muzaffarabad_first_month + $v[$month->format('F')]['amount'];
                        $muzaffarabad_second_month = $muzaffarabad_second_month + $v[$previous_month->format('F')]['amount'];
                        $muzaffarabad_third_month = $muzaffarabad_third_month + $v[$last_year->format('F')]['amount'];
                    @endphp
                @endforeach

                @if($total_count < $i)
                    <tr class="font-weight-bold text-right">
                        <td colspan="2" class="text-left">{{$key}} Total</td>
                        <td>{{number_format($third_month,2)}}</td>
                        <td>{{number_format($second_month,2)}}</td>
                        <td>{{number_format($first_month,2)}}</td>
                        <td>0</td>
                        <td>0%</td>
                        <td>0</td>
                        <td>0%</td>
                    </tr>
                @endif

            @endif



            @if($key == "RAWALAKOT")
                <tr>
                    <td colspan="9"><strong>{{$key}}</strong></td>
                </tr>
                @php
                    $i = 1; $total_count = count($data['RAWALAKOT']);
                    $first_month = 0;
                    $second_month = 0;
                    $third_month = 0;
                @endphp
                @foreach($value as $k => $v)
                    <tr>
                        <td class="text-center">{{$i}}</td>
                        <td class="text-left">{{$k}}</td>
                        <td class="text-right">{{number_format($v[$last_year->format('F')]['amount'],2)}}</td>
                        <td class="text-right">{{number_format($v[$previous_month->format('F')]['amount'],2)}}</td>
                        <td class="text-right">{{number_format($v[$month->format('F')]['amount'],2)}}</td>
                        <td class="text-right">0</td>
                        <td class="text-right">0.00%</td>
                        <td class="text-right">0</td>
                        <td class="text-right">0.00%</td>
                    </tr>
                    @php
                        $i++;
                        $first_month = $first_month + $v[$month->format('F')]['amount'];
                        $second_month = $second_month + $v[$previous_month->format('F')]['amount'];
                        $third_month = $third_month + $v[$last_year->format('F')]['amount'];

                        $rawalakot_first_month = $rawalakot_first_month + $v[$month->format('F')]['amount'];
                        $rawalakot_second_month = $rawalakot_second_month + $v[$previous_month->format('F')]['amount'];
                        $rawalakot_third_month = $rawalakot_third_month + $v[$last_year->format('F')]['amount'];
                    @endphp
                @endforeach

                @if($total_count < $i)
                    <tr class="font-weight-bold text-right">
                        <td colspan="2" class="text-left">{{$key}} Total</td>
                        <td>{{number_format($third_month,2)}}</td>
                        <td>{{number_format($second_month,2)}}</td>
                        <td>{{number_format($first_month,2)}}</td>
                        <td>0</td>
                        <td>0%</td>
                        <td>0</td>
                        <td>0%</td>
                    </tr>

{{--                    <tr class="font-weight-bold text-right">--}}
{{--                        <td colspan="2" class="text-left">North Total</td>--}}
{{--                        <td>{{number_format($muzaffarabad_third_month+ $rawalakot_third_month,2)}}</td>--}}
{{--                        <td>{{number_format($muzaffarabad_second_month+ $rawalakot_second_month,2)}}</td>--}}
{{--                        <td>{{number_format($muzaffarabad_first_month+ $rawalakot_first_month,2)}}</td>--}}
{{--                        <td>0</td>--}}
{{--                        <td>0%</td>--}}
{{--                        <td>0</td>--}}
{{--                        <td>0%</td>--}}
{{--                    </tr>--}}

                    <tr class="font-weight-bold text-right">
                        <td colspan="2" class="text-left">Bank Position</td>
                        <td>{{number_format($kotli_third_month + $mirpur_third_month + $muzaffarabad_third_month + $rawalakot_third_month,2)}}</td>
                        <td>{{number_format($kotli_second_month + $mirpur_second_month + $muzaffarabad_second_month + $rawalakot_second_month,2)}}</td>
                        <td>{{number_format($kotli_first_month + $mirpur_first_month + $muzaffarabad_first_month + $rawalakot_first_month,2)}}</td>
                        <td>0</td>
                        <td>0%</td>
                        <td>0</td>
                        <td>0%</td>
                    </tr>

                @endif
            @endif


            @if($key == "MIRPUR")
                <tr>
                    <td colspan="9"><strong>{{$key}}</strong></td>
                </tr>

                @php
                    $i = 1; $total_count = count($data['MIRPUR']);
                    $first_month = 0;
                    $second_month = 0;
                    $third_month = 0;
                @endphp

                @foreach($value as $k => $v)
                    <tr>
                        <td class="text-center">{{$i}}</td>
                        <td class="text-left">{{$k}}</td>
                        <td class="text-right">{{number_format($v[$last_year->format('F')]['amount'],2)}}</td>
                        <td class="text-right">{{number_format($v[$previous_month->format('F')]['amount'],2)}}</td>
                        <td class="text-right">{{number_format($v[$month->format('F')]['amount'],2)}}</td>
                        <td class="text-right">0</td>
                        <td class="text-right">0.00%</td>
                        <td class="text-right">0</td>
                        <td class="text-right">0.00%</td>
                    </tr>
                    @php
                        $i++;
                        $first_month = $first_month + $v[$month->format('F')]['amount'];
                        $second_month = $second_month + $v[$previous_month->format('F')]['amount'];
                        $third_month = $third_month + $v[$last_year->format('F')]['amount'];


                        $mirpur_first_month = $mirpur_first_month + $v[$month->format('F')]['amount'];
                        $mirpur_second_month = $mirpur_second_month + $v[$previous_month->format('F')]['amount'];
                        $mirpur_third_month = $mirpur_third_month + $v[$last_year->format('F')]['amount'];
                    @endphp
                @endforeach

                @if($total_count < $i)
                    <tr class="font-weight-bold text-right">
                        <td colspan="2" class="text-left">{{$key}} Total</td>
                        <td>{{number_format($third_month,2)}}</td>
                        <td>{{number_format($second_month,2)}}</td>
                        <td>{{number_format($first_month,2)}}</td>
                        <td>0</td>
                        <td>0%</td>
                        <td>0</td>
                        <td>0%</td>
                    </tr>
                @endif
            @endif


            @if($key == "KOTLI")
                <tr>
                    <td colspan="9"><strong>{{$key}}</strong></td>
                </tr>

                @php
                    $i = 1; $total_count = count($data['KOTLI']);
                    $first_month = 0;
                    $second_month = 0;
                    $third_month = 0;
                @endphp


                @foreach($value as $k => $v)
                    <tr>
                        <td class="text-center">{{$i}}</td>
                        <td class="text-left">{{$k}}</td>
                        <td class="text-right">{{number_format($v[$last_year->format('F')]['amount'],2)}}</td>
                        <td class="text-right">{{number_format($v[$previous_month->format('F')]['amount'],2)}}</td>
                        <td class="text-right">{{number_format($v[$month->format('F')]['amount'],2)}}</td>
                        <td class="text-right">0</td>
                        <td class="text-right">0.00%</td>
                        <td class="text-right">0</td>
                        <td class="text-right">0.00%</td>
                    </tr>
                    @php
                        $i++;
                        $first_month = $first_month + $v[$month->format('F')]['amount'];
                        $second_month = $second_month + $v[$previous_month->format('F')]['amount'];
                        $third_month = $third_month + $v[$last_year->format('F')]['amount'];

                        $kotli_first_month = $kotli_first_month + $v[$month->format('F')]['amount'];
                        $kotli_second_month = $kotli_second_month + $v[$previous_month->format('F')]['amount'];
                        $kotli_third_month = $kotli_third_month + $v[$last_year->format('F')]['amount'];


                    @endphp
                @endforeach

                @if($total_count < $i)
                    <tr class="font-weight-bold text-right">
                        <td colspan="2" class="text-left">{{$key}} Total</td>
                        <td>{{number_format($third_month,2)}}</td>
                        <td>{{number_format($second_month,2)}}</td>
                        <td>{{number_format($first_month,2)}}</td>
                        <td>0</td>
                        <td>0%</td>
                        <td>0</td>
                        <td>0%</td>
                    </tr>


{{--                    <tr class="font-weight-bold text-right">--}}
{{--                        <td colspan="2" class="text-left">North Total</td>--}}
{{--                        <td>{{number_format($kotli_third_month+ $mirpur_third_month,2)}}</td>--}}
{{--                        <td>{{number_format($kotli_second_month+ $mirpur_second_month,2)}}</td>--}}
{{--                        <td>{{number_format($kotli_first_month+ $mirpur_first_month,2)}}</td>--}}
{{--                        <td>0</td>--}}
{{--                        <td>0%</td>--}}
{{--                        <td>0</td>--}}
{{--                        <td>0%</td>--}}
{{--                    </tr>--}}

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
