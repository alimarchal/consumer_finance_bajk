@extends('theme.main')
@section('breadcrumb')
    Borrower Profile / Installment
@endsection
@section('body')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <form method="post" action="{{route('installment.store', $customer->id)}}">
        @csrf
        @include('theme.customer')

        <br>

        <div class="form-row">

            <div class="col-md-3 mb-2">
                <label for="date"><strong>Date</strong></label>
                <input type="date" class="form-control" id="date" name="date">
            </div>


            <div class="col-md-3 mb-3">
                <label for="no_of_installment"><strong>No of Installment</strong></label>
                <select class="form-control select2bs4" required id="no_of_installment" style="width: 100%;" name="no_of_installment">
                    <option value="">None</option>
                    @for($i = 1; $i <= 240; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
            </div>



            <div class="col-md-3 mb-3">
                <label for="days_passed_overdue"><strong>Days Passed Overdue</strong></label>
                <select class="form-control select2bs4" required id="days_passed_overdue" style="width: 100%;" name="days_passed_overdue">
                    <option value="">None</option>
                    @for($i = 1; $i <= 240; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
            </div>



            <div class="col-md-3 mb-2">
                <label for="principal_amount"><strong>Principal</strong></label>
                <input type="number" step="0.01" class="form-control" id="principal_amount" name="principal_amount">
            </div>

            <div class="col-md-3 mb-2">
                <label for="mark_up_amount"><strong>Mark-Up</strong></label>
                <input type="number" step="0.01" class="form-control" id="mark_up_amount" name="mark_up_amount">
            </div>

            <div class="col-md-3 mb-2">
                <label for="penalty_charges"><strong>Penalty Charges</strong></label>
                <input type="number" step="0.01" class="form-control" id="penalty_charges" name="penalty_charges">
            </div>


            <div class="col-md-3 mb-2">
                <label for="total_principal_markup_penalty"><strong>Total</strong></label>
                <input type="number" step="0.01" class="form-control" id="total_principal_markup_penalty" name="total_principal_markup_penalty">
            </div>



            <div class="col-md-3 mb-3">
                <label for="category_of_default"><strong>Category</strong></label>
                <select class="form-control select2bs4" required id="category_of_default" style="width: 100%;" name="category_of_default">
                    <option value="">None</option>
                    <option value="Regular" selected>Regular</option>
                    <option value="Irregular">Irregular</option>
                    <option value="Sub Standard">Sub Standard</option>
                    <option value="Doubtful">Doubtful</option>
                    <option value="Loss">Loss</option>
                </select>
            </div>
        </div>
        <button class="btn btn-primary float-right" type="submit">Save</button>
    </form>


    <br>
    @if($customer->installments->isNotEmpty())
        <h2 class="text-center" style="border-top: 1px solid red; border-bottom: 1px solid red; padding: 10px; margin-bottom: 30px; margin-top: 30px;">
            Installment</h2>
        <table class="table table-bordered border-collapse">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">No of Installment</th>
                <th scope="col">Days Passed Overdue</th>
                <th scope="col">Principal</th>
                <th scope="col">Mark-Up</th>
                <th scope="col">Penalty Charges</th>
                <th scope="col">Total</th>
                <th scope="col">Category</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customer->installments as $co)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$co->date}}</td>
                    <td>{{$co->no_of_installment}}</td>
                    <td>{{$co->days_passed_overdue}}</td>
                    <td>{{$co->principal_amount}}</td>
                    <td>{{$co->mark_up_amount}}</td>
                    <td>{{$co->penalty_charges}}</td>
                    <td>{{$co->total_principal_markup_penalty}}</td>
                    <td>{{$co->category_of_default}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif
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
