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


    <form method="get" action="{{route('report.branchWiseNplPosition')}}">
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
        <br> Branch Wise NPL Position - ({{$month->format('F - Y')}})
    </h5>
    <br>

    <table class="table table-bordered  ">
        <thead>
        <tr>
            <th scope="col" class="align-middle text-center" rowspan="2" width="0.1%">S.No</th>
            <th scope="col" class="align-middle text-center" rowspan="2">Branch</th>
            <th scope="col" class="align-middle text-center" colspan="2">{{$last_year->format('F, Y')}}</th>
            <th scope="col" class="align-middle text-center" colspan="2">{{$month->format('F, Y')}}</th>
            <th scope="col" class="align-middle text-center" colspan="2">{{$month->format('F, Y')}}<br> vs <br>{{$last_year->format('F, Y')}}</th>
        </tr>

        <tr>
            <th scope="col" class="align-middle text-center">No</th>
            <th scope="col" class="align-middle text-center">Amount</th>
            <th scope="col" class="align-middle text-center">No</th>
            <th scope="col" class="align-middle text-center">Amount</th>
            <th scope="col" class="align-middle text-center">No</th>
            <th scope="col" class="align-middle text-center">Amount</th>
        </thead>
        <tbody>
        @foreach($data as $key => $value)

            @if($key == "North Region")
                <tr>
                    <td colspan="9"><strong>{{$key}}</strong></td>
                </tr>
                @php
                    $i = 1; $total_count = count($data['North Region']);
                @endphp
                @foreach($value as $k => $v)
                    @if($k == "Muzaffarabad")
                        <tr>
                            <td colspan="9"><strong>{{$k}} Zone</strong></td>
                        </tr>

                        @foreach($v as $x => $y)
                            <tr>
                                <td class="text-center">{{$i}}</td>
                                <td class="text-left">{{$x}}</td>
                                <td class="text-right">{{$y[$last_year->format('F')]['no_of_accounts']}}</td>
                                <td class="text-right">{{number_format($y[$last_year->format('F')]['amount'],2)}}</td>

                                <td class="text-right">{{$y[$month->format('F')]['no_of_accounts']}}</td>
                                <td class="text-right">{{number_format($y[$month->format('F')]['amount'],2)}}</td>

                                <td class="text-right">0</td>
                                <td class="text-right">0.00</td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach

                        <tr>
                            <td class="text-center" colspan="2">{{$k}} Zone Total</td>
                            <td class="text-right">
                                {{$data_total[$key][$k][$last_year->format('F')]['no_of_accounts']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key][$k][$last_year->format('F')]['amount']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key][$k][$month->format('F')]['no_of_accounts']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key][$k][$month->format('F')]['amount']}}
                            </td>
                            <td class="text-right">**</td>
                            <td class="text-right">**</td>
                        </tr>
                    @endif

                    @if($k == "Rawalakot")
                        <tr>
                            <td colspan="9"><strong>{{$k}} Zone</strong></td>
                        </tr>

                        @foreach($v as $x => $y)
                            <tr>
                                <td class="text-center">{{$i}}</td>
                                <td class="text-left">{{$x}}</td>
                                <td class="text-right">{{$y[$last_year->format('F')]['no_of_accounts']}}</td>
                                <td class="text-right">{{number_format($y[$last_year->format('F')]['amount'],2)}}</td>

                                <td class="text-right">{{$y[$month->format('F')]['no_of_accounts']}}</td>
                                <td class="text-right">{{number_format($y[$month->format('F')]['amount'],2)}}</td>

                                <td class="text-right">0</td>
                                <td class="text-right">0.00</td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach

                        <tr>
                            <td class="text-center" colspan="2">{{$k}} Zone Total</td>
                            <td class="text-right">
                                {{$data_total[$key][$k][$last_year->format('F')]['no_of_accounts']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key][$k][$last_year->format('F')]['amount']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key][$k][$month->format('F')]['no_of_accounts']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key][$k][$month->format('F')]['amount']}}
                            </td>
                            <td class="text-right">**</td>
                            <td class="text-right">**</td>
                        </tr>



                        <tr>
                            <td class="text-center" colspan="2">{{$key}} Total</td>
                            <td class="text-right">
                                {{$data_total[$key]['Rawalakot'][$last_year->format('F')]['no_of_accounts'] + $data_total[$key]['Muzaffarabad'][$last_year->format('F')]['no_of_accounts']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key]['Muzaffarabad'][$last_year->format('F')]['amount'] + $data_total[$key]['Rawalakot'][$last_year->format('F')]['amount']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key]['Rawalakot'][$month->format('F')]['no_of_accounts'] + $data_total[$key]['Muzaffarabad'][$month->format('F')]['no_of_accounts']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key]['Muzaffarabad'][$month->format('F')]['amount'] + $data_total[$key]['Rawalakot'][$month->format('F')]['amount']}}
                            </td>
                            <td class="text-right">**</td>
                            <td class="text-right">**</td>
                        </tr>

                    @endif
                @endforeach
            @endif


            @if($key == "South Region")
                <tr>
                    <td colspan="9"><strong>{{$key}}</strong></td>
                </tr>
                @php
                    $i = 1; $total_count = count($data['South Region']);
                @endphp
                @foreach($value as $k => $v)
                    @if($k == "Mirpur")
                        <tr>
                            <td colspan="9"><strong>{{$k}} Zone</strong></td>
                        </tr>

                        @foreach($v as $x => $y)
                            <tr>
                                <td class="text-center">{{$i}}</td>
                                <td class="text-left">{{$x}}</td>
                                <td class="text-right">{{$y[$last_year->format('F')]['no_of_accounts']}}</td>
                                <td class="text-right">{{number_format($y[$last_year->format('F')]['amount'],2)}}</td>

                                <td class="text-right">{{$y[$month->format('F')]['no_of_accounts']}}</td>
                                <td class="text-right">{{number_format($y[$month->format('F')]['amount'],2)}}</td>

                                <td class="text-right">0</td>
                                <td class="text-right">0.00</td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach

                        <tr>
                            <td class="text-center" colspan="2">{{$k}} Zone Total</td>
                            <td class="text-right">
                                {{$data_total[$key][$k][$last_year->format('F')]['no_of_accounts']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key][$k][$last_year->format('F')]['amount']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key][$k][$month->format('F')]['no_of_accounts']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key][$k][$month->format('F')]['amount']}}
                            </td>
                            <td class="text-right">**</td>
                            <td class="text-right">**</td>
                        </tr>
                    @endif

                    @if($k == "Kotli")
                        <tr>
                            <td colspan="9"><strong>{{$k}} Zone</strong></td>
                        </tr>

                        @foreach($v as $x => $y)
                            <tr>
                                <td class="text-center">{{$i}}</td>
                                <td class="text-left">{{$x}}</td>
                                <td class="text-right">{{$y[$last_year->format('F')]['no_of_accounts']}}</td>
                                <td class="text-right">{{number_format($y[$last_year->format('F')]['amount'],2)}}</td>

                                <td class="text-right">{{$y[$month->format('F')]['no_of_accounts']}}</td>
                                <td class="text-right">{{number_format($y[$month->format('F')]['amount'],2)}}</td>

                                <td class="text-right">0</td>
                                <td class="text-right">0.00</td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach

                        <tr>
                            <td class="text-center" colspan="2">{{$k}} Zone Total</td>
                            <td class="text-right">
                                {{$data_total[$key][$k][$last_year->format('F')]['no_of_accounts']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key][$k][$last_year->format('F')]['amount']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key][$k][$month->format('F')]['no_of_accounts']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key][$k][$month->format('F')]['amount']}}
                            </td>
                            <td class="text-right">**</td>
                            <td class="text-right">**</td>
                        </tr>


                        <tr>
                            <td class="text-center" colspan="2">{{$key}} Total</td>
                            <td class="text-right">
                                {{$data_total[$key]['Mirpur'][$last_year->format('F')]['no_of_accounts'] + $data_total[$key]['Kotli'][$last_year->format('F')]['no_of_accounts']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key]['Mirpur'][$last_year->format('F')]['amount'] + $data_total[$key]['Kotli'][$last_year->format('F')]['amount']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key]['Mirpur'][$month->format('F')]['no_of_accounts'] + $data_total[$key]['Kotli'][$month->format('F')]['no_of_accounts']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key]['Mirpur'][$month->format('F')]['amount'] + $data_total[$key]['Kotli'][$month->format('F')]['amount']}}
                            </td>
                            <td class="text-right">**</td>
                            <td class="text-right">**</td>
                        </tr>



                        <tr>
                            <td class="text-center" colspan="2">Bank Position</td>
                            <td class="text-right">
                                {{$data_total[$key]['Mirpur'][$last_year->format('F')]['no_of_accounts'] + $data_total[$key]['Kotli'][$last_year->format('F')]['no_of_accounts'] + $data_total['North Region']['Rawalakot'][$last_year->format('F')]['no_of_accounts'] + $data_total['North Region']['Muzaffarabad'][$last_year->format('F')]['no_of_accounts']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key]['Mirpur'][$last_year->format('F')]['amount'] + $data_total[$key]['Kotli'][$last_year->format('F')]['amount'] + $data_total['North Region']['Muzaffarabad'][$last_year->format('F')]['amount'] + $data_total['North Region']['Rawalakot'][$last_year->format('F')]['amount']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key]['Mirpur'][$month->format('F')]['no_of_accounts'] + $data_total[$key]['Kotli'][$month->format('F')]['no_of_accounts'] +
                            $data_total['North Region']['Rawalakot'][$month->format('F')]['no_of_accounts'] + $data_total['North Region']['Muzaffarabad'][$month->format('F')]['no_of_accounts']}}
                            </td>
                            <td class="text-right">
                                {{$data_total[$key]['Mirpur'][$month->format('F')]['amount'] + $data_total[$key]['Kotli'][$month->format('F')]['amount'] +
                            $data_total['North Region']['Muzaffarabad'][$month->format('F')]['amount'] + $data_total['North Region']['Rawalakot'][$month->format('F')]['amount']}}
                            </td>
                            <td class="text-right">**</td>
                            <td class="text-right">**</td>
                        </tr>
                    @endif
                @endforeach
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
