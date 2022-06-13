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

    @include('theme.customer')

    <form method="post" action="{{route('customer.store')}}">
        @csrf
        <br>
{{--                @livewire('branch-list')--}}

        <div class="form-row">
            <div class="col-md-12 mb-2">
                <label for="branch"><strong>Please select branch</strong></label>
                <select class="form-control select2bs4" id="branch_id" style="width: 100%;" name="branch_id" required>
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
                        <div class="invalid-feedback">
                            Please provide a name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="son_daughter_wife"><strong>So/Do/Wo</strong></label>
                        <input type="text" class="form-control" id="son_daughter_wife" required name="son_daughter_wife">
                        <div class="invalid-feedback">
                            Please provide a So/Do/Wo.
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="gender"><strong>Gender</strong></label>
                        <select class="form-control select2bs4" required id="gender" style="width: 100%;" name="gender">
                            <option value="">None</option>
                            <option value="Male">Male</option>
                            <option value="Male">Female</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a Gender.
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="business_department_profession"><strong>Business/Department/Profession</strong></label>
                        <input name="business_department_profession" class="form-control" id="business_department_profession"
                               required>
                        <div class="invalid-feedback">
                            Please provide a Business/Department/Profession.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="designation"><strong>Designation </strong></label>
                        <input type="text" class="form-control" id="designation" title="" name="designation" required>
                        <div class="invalid-feedback">
                            Please provide a Designation.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="pp_number"><strong>PP Number</strong></label>
                        <input type="text" class="form-control" id="pp_number" name="pp_number" required>
                        <div class="invalid-feedback">
                            Please provide a Designation.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="date_of_birth"><strong>Date of Birth</strong></label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>

                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="office_business_address"><strong>Office/Business Address</strong></label>
                        <input class="form-control" id="office_business_address" required
                               name="office_business_address">

                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="present_address"><strong>Present Address</strong></label>
                        <input class="form-control" id="present_address" required
                               name="present_address">

                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="permanent_address"><strong>Permanent Address</strong></label>
                        <input class="form-control" id="permanent_address" required
                               name="permanent_address">

                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="customer_cnic"><strong>CNIC</strong></label>
                        <input type="text" class="form-control" id="customer_cnic" title="" name="customer_cnic">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="customer_contact_number"><strong>Contact Number</strong></label>
                        <input type="text" class="form-control" id="customer_contact_number" required name="customer_contact_number">

                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="account_cd_saving"><strong>Ac Number/CD/Saving</strong></label>
                        <input type="text" class="form-control" id="account_cd_saving" required name="account_cd_saving">

                    </div>
                </div>




                <hr class="bg-danger">
                    <h2 class="text-danger text-center">Facility Detail</h2>
                <hr class="bg-danger">

                    @livewire('facility')


                    <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="amount_enhanced"><strong>Amount Enhanced (if any) </strong></label>
                        <input type="number" step="0.01" min="0.00" value="0.00" class="form-control" id="amount_enhanced" required name="amount_enhanced">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="sanction_date"><strong>Sanctioned Date</strong></label>
                        <input type="date" class="form-control" id="sanction_date" required name="sanction_date">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="tenure_of_loan_in_months"><strong>Tenure of Loan in Months</strong></label>

                        <select class="form-control select2bs4" required id="tenure_of_loan_in_months" style="width: 100%;" name="tenure_of_loan_in_months">
                            <option value="">None</option>
                           @for($i = 1; $i <= 60; $i++)
                                <option value="{{$i}}">{{$i}} Months</option>
                           @endfor
                        </select>

                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="installment_type"><strong>Installment Type</strong></label>
                        <select class="form-control select2bs4" required id="installment_type" style="width: 100%;" name="installment_type">
                            <option value="">None</option>
                            <option value="Monthly">Monthly</option>
                            <option value="Quarterly">Quarterly</option>
                            <option value="Lump sump">Lump sump</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="no_of_installments"><strong>No of Installment</strong></label>
                        <input type="text" class="form-control" id="no_of_installments" required
                               name="no_of_installments">
                        <div class="invalid-feedback">
                            Please provide a No of Installment.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="dac_issuance_date"><strong>DAC Issuance Date</strong></label>
                        <input type="date" class="form-control" id="dac_issuance_date" required
                               name="dac_issuance_date">
                        <div class="invalid-feedback">
                            Please provide a Dac Issuance Date.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="disbursement_date"><strong>DAC Disbursement Date</strong></label>
                        <input type="date" class="form-control" id="disbursement_date" required
                               name="disbursement_date">
                        <div class="invalid-feedback">
                            Please provide a DAC Disbursement Date.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="amount_disbursed"><strong>Amount Disbursed</strong></label>
                        <input type="number" class="form-control" id="amount_disbursed" required
                               name="amount_disbursed">
                        <div class="invalid-feedback">
                            Please provide a Amount Disbursed.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="expiry_date_as_per_dac"><strong>Expiry Date as per DAC</strong></label>
                        <input type="date" class="form-control" id="expiry_date_as_per_dac" required name="expiry_date_as_per_dac">
                        <div class="invalid-feedback">
                            Please provide a Sanctioned Date.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="mark_up_rate"><strong>Markup Rate</strong></label>
                        <input type="text" class="form-control" id="mark_up_rate" required name="mark_up_rate">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="branch_manager_name_while_sanctioning"><strong>Branch Manager Name</strong></label>
                        <input type="text" class="form-control" id="branch_manager_name_while_sanctioning" required
                               name="branch_manager_name_while_sanctioning">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                </div>


                <hr class="bg-danger">
                <h2 class="text-danger text-center">Installment</h2>
                <hr class="bg-danger">

                <livewire:installment />



        <hr class="bg-danger">
            <h3 class="text-center text-danger">Valuation</h3>
        <hr class="bg-danger">

        <div class="form-row">
            <div class="col-md-6 mb-2">
                <label><strong>Evaluator Company</strong></label>
                <input type="text" class="form-control" required id="valuation_evaluator_company"
                       name="valuation_evaluator_company">
            </div>
            <div class="col-md-6 mb-3">
                <label><strong>Date of Valuation</strong></label>
                <input type="date" class="form-control" required id="valuation_date_of_valuation"
                       name="valuation_date_of_valuation">
            </div>
        </div>


                <!--


                                    <div class="col-md-3 mb-3">
                        <label><strong>Installment Deposit Date</strong></label>
                        <input type="date" class="form-control" id="validationCustom52" title="" name="customer[installment_deposit_date]" required>
                        <div class="invalid-feedback">
                            Please provide a Installment Deposit Date.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>Installment Due Date</strong></label>
                        <input type="date" class="form-control" id="validationCustom52" name="customer[installment_due_date]">
                        <div class="invalid-feedback">
                            Please provide Installment Due Date.
                        </div>
                    </div>


                <hr class="bg-danger">
                <h2 class="text-danger text-center">Previous Months Installment</h2>
                <hr class="bg-danger">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label><strong>No of Installment</strong></label>
                        <input type="text" class="form-control" name="customer[previous_months_no_of_installment]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>Days Passed Overdue</strong></label>
                        <input type="text" class="form-control" name="customer[previous_months_days_passed_overdue]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>Principle (a)</strong></label>
                        <input type="text" class="form-control" name="customer[previous_months_principle_a]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>Markup (b)</strong></label>
                        <input type="text" class="form-control" name="customer[previous_months_mark_up_b]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>Penalty Charges (c)</strong></label>
                        <input type="text" class="form-control" name="customer[previous_months_penalty_charges_c]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>Total (a+b+c)</strong></label>
                        <input type="text" class="form-control" name="customer[previous_months_total_abc]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>Category of Default</strong></label>
                        <input type="text" class="form-control" name="customer[previous_months_category_of_default]">
                    </div>
                </div>

                <hr class="bg-danger">
                <h2 class="text-danger text-center">Current Month Installment</h2>
                <hr class="bg-danger">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label><strong>No of Installment</strong></label>
                        <input type="text" class="form-control" name="customer[current_months_no_of_installment]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>Days Passed Overdue</strong></label>
                        <input type="text" class="form-control" name="customer[current_months_day_passed_overdue]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>Principle (a)</strong></label>
                        <input type="text" class="form-control" name="customer[current_months_principle_a]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>Markup (b)</strong></label>
                        <input type="text" class="form-control" name="customer[current_months_mark_up_b]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>Penalty Charges (c)</strong></label>
                        <input type="text" class="form-control" name="customer[current_months_penalty_charges_c]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>Total (a+b+c)</strong></label>
                        <input type="text" class="form-control" name="customer[current_months_total_abc]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>Category of Default</strong></label>
                        <input type="text" class="form-control" name="customer[current_months_category_of_default]">
                    </div>
                </div>


                <hr class="bg-danger">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label><strong>Adjustment Recovery During the Month Principle Amount</strong></label>
                        <input type="text" class="form-control" name="customer[adjustment_recovery_during_the_month_principle_amount]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>Partial Cash Recovery</strong></label>
                        <input type="text" class="form-control" name="customer[partial_cash_recovery]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>Facility outstanding amount secured principle previous</strong></label>
                        <input type="text" class="form-control" name="customer[facility_outstanding_amount_secured_principle_previous]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>{{ucfirst(str_replace('_',' ','facility_outstanding_amount_secured_principle_current'))}}</strong></label>
                        <input type="text" class="form-control" name="customer[facility_outstanding_amount_secured_principle_current]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>{{ucfirst(str_replace('_',' ','facility_outstanding_amount_unsecured_principle_previous'))}}</strong></label>
                        <input type="text" class="form-control" name="customer[facility_outstanding_amount_unsecured_principle_previous]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>{{ucfirst(str_replace('_',' ','facility_outstanding_amount_unsecured_principle_current'))}}</strong></label>
                        <input type="text" class="form-control" name="customer[facility_outstanding_amount_unsecured_principle_current]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>NPL Amount</strong></label>
                        <input type="text" class="form-control" name="customer[npl_amount]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>{{ucfirst(str_replace('_',' ','markup_detail_markup_receivable_4600'))}}</strong></label>
                        <input type="text" class="form-control" name="customer[markup_detail_markup_receivable_4600]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>{{ucfirst(str_replace('_',' ','markup_detail_mark_up_recovered_since_01_01_2019_till_date'))}}</strong></label>
                        <input type="text" class="form-control" name="customer[markup_detail_mark_up_recovered_since_01_01_2019_till_date]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>{{ucfirst(str_replace('_',' ','markup_detail_mark_up_recoverable_a_c_5008'))}}</strong></label>
                        <input type="text" class="form-control" name="customer[markup_detail_mark_up_recoverable_a_c_5008]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>{{ucfirst(str_replace('_',' ','markup_detail_mark_up_reserve_a_c_2305'))}}</strong></label>
                        <input type="text" class="form-control" name="customer[markup_detail_mark_up_reserve_a_c_2305]">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="card card-default">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <br>
                <h3 class="text-center text-danger" title="63">Guarantor Number 1 Details</h3>
            </div>

            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-3 mb-2">
                        <label><strong>Name</strong></label>
                        <input type="text" class="form-control" id="validationCustom27" title="" name="customer[personal_guarantee_no_1_detail_name]">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>CNIC Number</strong></label>
                        <input type="text" class="form-control" id="validationCustom28" title="" name="customer[personal_guarantee_no_1_detail_cnic]">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>Contact Number</strong></label>
                        <input type="text" class="form-control" id="validationCustom29" title=""
                               name="customer[personal_guarantee_no_1_detail_contact]">
                    </div>


                    <div class="col-md-3 mb-3">
                        <label><strong>Department/Business</strong></label>
                        <input type="text" class="form-control" id="validationCustom30" title=""
                               name="customer[personal_guarantee_no_1_detail_dept_business]">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-2">
                        <label><strong>Business/Dept/Address</strong></label>
                        <textarea name="customer[personal_guarantee_no_1_detail_dept_business_address]" class="form-control" id="validationCustom31"
                                  title=""></textarea>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label><strong>Guarantor Address</strong></label>
                        <textarea name="customer[personal_guarantee_no_1_detail_address]" class="form-control" id="validationCustom32" title=""></textarea>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>BPS</strong></label>
                        <input type="text" class="form-control" id="validationCustom33" title="" name="customer[personal_guarantee_no_1_detail_bps]">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>PP Number</strong></label>
                        <input type="text" class="form-control" id="validationCustom34" title="" name="customer[personal_guarantee_no_1_detail_pp_if_salaried]">
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-default">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <br>
                <h3 class="text-center text-danger" title="63">Guarantor Number 2 Details</h3>
            </div>

            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-3 mb-2">
                        <label><strong>Name</strong></label>
                        <input type="text" class="form-control" id="validationCustom35" title="" name="customer[personal_guarantee_no_2_detail_name]">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>CNIC Number</strong></label>
                        <input type="text" class="form-control" id="validationCustom36" title="" name="customer[personal_guarantee_no_2_detail_cnic]">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>Contact Number</strong></label>
                        <input type="text" class="form-control" id="validationCustom37" title=""
                               name="customer[personal_guarantee_no_2_detail_contact]">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>Department/Business</strong></label>
                        <input type="text" class="form-control" id="validationCustom38" title=""
                               name="customer[personal_guarantee_no_2_detail_dept_business]">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-2">
                        <label><strong>Business/Dept/Address</strong></label>
                        <textarea name="customer[personal_guarantee_no_2_detail_dept_business_address]" class="form-control" id="validationCustom39"
                                  title=""></textarea>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label><strong>Guarantor Address</strong></label>
                        <textarea name="customer[personal_guarantee_no_2_detail_address]" class="form-control" id="validationCustom40" title=""></textarea>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>BPS</strong></label>
                        <input type="text" class="form-control" id="validationCustom41" title="" name="customer[personal_guarantee_no_2_detail_bps]">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label><strong>PP Number</strong></label>
                        <input type="text" class="form-control" id="validationCustom42" title="" name="customer[personal_guarantee_no_2_detail_pp_if_salaried]">
                    </div>
                </div>
            </div>
        </div>


        <div class="card card-default">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <br>
                <h3 class="text-center text-danger">Other Than Personal Guarantee</h4>
            </div>

            <div class="card-body">

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
            </div>
        </div>

        <div class="card card-default">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <br>
                <h3 class="text-center text-danger">Valuation</h3>
            </div>


            <div class="card-body">

                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        <label><strong>Evaluator Company</strong></label>
                        <input type="text" class="form-control" id="validationCustom48" title=""
                               name="customer[valuation_evaluator_company]">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label><strong>Date of Valuation</strong></label>
                        <input type="date" class="form-control" id="validationCustom49" title=""
                               name="customer[valuation_date_of_valuation]">
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-default">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <br>
                <h3 class="text-center text-danger">Insurance</h3>
            </div>

            <div class="card-body">
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
                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        <label><strong>Claim Amount</strong></label>
                        <input type="text" class="form-control" id="validationCustom48" title="" name="customer[insurance_claim_outstanding_claim_amount]">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label><strong>Date of Claim</strong></label>
                        <input type="date" class="form-control" id="validationCustom54" title="" name="customer[insurance_claim_outstanding_date_of_claim]">
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-default">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <br>
                <h3 class="text-center text-danger">NPL Recovery Remarks</h3>
            </div>

            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-12 mb-2">
                        <label for="validationCustom54" title="92"><strong>NPL Recovery Remarks</strong></label>
                        <textarea name="customer[npl_recovery_remarks]" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-default">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <br>
                <h3 class="text-center text-danger">Litigation Status</h3>
            </div>

            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-4 mb-2">
                        <label><strong>Name of Court</strong></label>
                        <input type="text" class="form-control" id="validationCustom50" title=""
                               name="customer[litigation_status_name_of_court]">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label><strong>Recovery Status (Full or Partial)</strong></label>
                        <input type="text" class="form-control" id="validationCustom51" title=""
                               name="customer[litigation_status_recovery_status_full_or_partial]">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label><strong>Date of Final Settlement</strong></label>
                        <input type="date" class="form-control" id="validationCustom52" title=""
                               name="customer[litigation_status_date_of_final_settlement]">
                    </div>
                    <input type="hidden" name="customer[status]" value="Regular">
                </div>
            </div>
        </div>
        -->

        <button class="btn btn-primary" type="submit">Save & Next</button>
    </form>
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
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

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
                    ranges   : {
                        'Today'       : [moment(), moment()],
                        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate  : moment()
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

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })

    </script>
@endsection
