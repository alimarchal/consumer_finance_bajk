@extends('theme.main')
@section('breadcrumb')
    test
@endsection

@section('customHeaderScripts')
    {{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css"  rel="stylesheet"/>--}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" defer></script>--}}
    {{--<link rel="stylesheet" href="{{url('AdminLTE/plugins/select2/css/select2.min.css')}}">--}}
    {{--<link rel="stylesheet" href="{{url('AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">--}}
@endsection

@section('body')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{route('users.store')}}">
        @csrf
        <br>

        <div class="form-row">
            <div class="col-md-12 mb-2">
                <label for="branch"><strong>Please select branch</strong></label>
                <select class="form-control select2bs4" id="branch_id" style="width: 100%;" name="branch_id">
                    <option value="">None</option>
                    @foreach(\App\Models\Branch::all() as $branch)
                        <option value="{{$branch->id}}">{{$branch->code}} - {{$branch->region}} - {{$branch->zone}} - {{$branch->district}} - {{$branch->name}}</option>
                    @endforeach

                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3 mb-2">
                <label for="name"><strong>Name</strong></label>
                <input type="text" id="name" class="form-control" name="name" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="designation"><strong>Designation</strong></label>
                <input type="text" class="form-control" id="designation" required name="designation">
            </div>

            <div class="col-md-3 mb-3">
                <label for="email"><strong>Official Email ID</strong></label>
                <input type="text" class="form-control" id="email" required name="email">
            </div>

            <div class="col-md-3 mb-3">
                <label for="password"><strong>Password</strong></label>
                <input type="password" class="form-control" id="password" required name="password">
            </div>
            <div class="col-md-3 mb-2">
                <label for="status"><strong>Status</strong></label>
                <select class="form-control select2bs4" required id="status" style="width: 100%;" name="status">
                    <option value="">None</option>
                    <option value="Active">Active</option>
                    <option value="Deactivate">Deactivate</option>
                </select>
            </div>

            <div class="col-md-3 mb-2">
                <label for="role"><strong>Role</strong></label>
                <select class="form-control select2bs4" required id="role" style="width: 100%;" name="role">
                    <option value="">None</option>
                    <option value="Credit Officer">Credit Officer</option>
                    <option value="Branch Manager">Branch Manager</option>
                    <option value="MUZAFFARABAD REGION">MUZAFFARABAD Region</option>
                    <option value="MIRPUR REGION">MIRPUR Region</option>
                    <option value="RAWALAKOT REGION">RAWALAKOT Region</option>
                    <option value="Head Office">Head Office</option>
                    <option value="Super-Admin">Super-Admin</option>
                </select>
            </div>
        </div>

        <button class="btn btn-danger float-right " type="submit">Create User</button>
    </form>
@endsection


@section('customFooterScripts')
    <script src="https://emis.ajk.gov.pk/assets/js/jquery.mask.js" defer></script>
    <script>

        $(document).ready(function () {
            $kibor_value = 0
            $bank_spread_rate = 0
            $total_value = $kibor_value + $bank_spread_rate;

            $("#kibor_rate").change(function() {
                $kibor_value = parseFloat($(this).val(),2);
                $bank_spread_rate = parseFloat($("#bank_spread_rate").val());
                $total_value = $kibor_value + $bank_spread_rate;
                $("#mark_up_rate").val(parseFloat($total_value));
            });

            $("#bank_spread_rate").change(function() {

                $bank_spread_rate = parseFloat($(this).val(),2);
                $kibor_value = parseFloat($("#kibor_rate").val());
                $total_value = $kibor_value + $bank_spread_rate;
                $("#mark_up_rate").val(parseFloat($total_value));
                // alert($total_value);
            });
        });

        $(document).ready(function () {
            $('.select2').select2();
            $('.cnic_mask').mask('00000-0000000-0');
            $('.number_mask').mask('0000-0000000');
            $('.phone_mask').mask('00000-000000');
        });

        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

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
