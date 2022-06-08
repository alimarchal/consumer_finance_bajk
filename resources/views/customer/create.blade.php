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
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#" class="nav-link active">
                    Borrower Profile
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Personal Guarantee</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Other Than Guarantee</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Insurance</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Litigation Status</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link ">Installments</a>
            </li>

        </ul>

        <br>
                @livewire('branch-list')

                <div class="form-row">
                    <div class="col-md-3 mb-2">
                        <label for="name"><strong>Name</strong></label>
                        <input type="text" id="name" class="form-control" name="name">
                        <div class="invalid-feedback">
                            Please provide a name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="son_daughter_wife"><strong>So/Do/Wo</strong></label>
                        <input type="text" class="form-control" id="son_daughter_wife" title="" name="son_daughter_wife">
                        <div class="invalid-feedback">
                            Please provide a So/Do/Wo.
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="gender"><strong>Gender</strong></label>
                        <select class="custom-select" title="" id="gender" name="gender">
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
                               title="">
                        <div class="invalid-feedback">
                            Please provide a Business/Department/Profession.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="designation"><strong>Designation </strong></label>
                        <input type="text" class="form-control" id="designation" title="" name="designation">
                        <div class="invalid-feedback">
                            Please provide a Designation.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="pp_number"><strong>PP Number</strong></label>
                        <input type="text" class="form-control" id="pp_number" title="" name="pp_number">
                        <div class="invalid-feedback">
                            Please provide a Designation.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="date_of_birth"><strong>Date of Birth</strong></label>
                        <input type="date" class="form-control" id="date_of_birth" title="" name="date_of_birth">

                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="office_business_address"><strong>Office/Business Address</strong></label>
                        <input class="form-control" id="office_business_address" title=""
                               name="office_business_address">

                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="present_address"><strong>Present Address</strong></label>
                        <input class="form-control" id="present_address" title=""
                               name="present_address">

                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="permanent_address"><strong>Permanent Address</strong></label>
                        <input class="form-control" id="permanent_address" title=""
                               name="permanent_address">

                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="customer_cnic"><strong>CNIC</strong></label>
                        <input type="text" class="form-control" id="customer_cnic" title="" name="customer_cnic">
                        <div class="invalid-feedback">
                            Please provide a CNIC Number.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="customer_contact_number"><strong>Contact Number</strong></label>
                        <input type="text" class="form-control" id="customer_contact_number" title="" name="customer_contact_number">

                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="account_cd_saving"><strong>Ac Number/CD/Saving</strong></label>
                        <input type="text" class="form-control" id="account_cd_saving" name="account_cd_saving">

                    </div>
                </div>




                <hr class="bg-danger">
                    <h2 class="text-danger text-center">Facility Detail</h2>
                <hr class="bg-danger">

                    @livewire('facility')


                    <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="amount_enhanced"><strong>Amount Enhanced (if any) </strong></label>
                        <select class="custom-select" title="" id="amount_enhanced"
                                name="amount_enhanced">
                            <option value="">None</option>
                            {{--                    @foreach($rhf as $fa)--}}
                            {{--                        <option value="{{$fa->rhf}}">--}}
                            {{--                            {{$fa->rhf }}--}}
                            {{--                        </option>--}}
                            {{--                    @endforeach--}}
                        </select>
                        <div class="invalid-feedback">
                            Please provide a Renewal/Enhancement.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="sanction_date"><strong>Sanctioned Date</strong></label>
                        <input type="date" class="form-control" id="sanction_date" title="" name="sanction_date">
                        <div class="invalid-feedback">
                            Please provide a Sanctioned Date.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="tenure_of_loan_in_months"><strong>Tenure of Loan in Months</strong></label>
                        <input type="text" class="form-control" id="tenure_of_loan_in_months" title="" name="tenure_of_loan_in_months">
                        <div class="invalid-feedback">
                            Please provide a Tenure of Loan.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="installment_type"><strong>Installment Type</strong></label>
                        <input type="text" class="form-control" id="installment_type" title=""
                               name="installment_type">
                        <div class="invalid-feedback">
                            Please provide a Installment Type.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="no_of_installments"><strong>No of Installment</strong></label>
                        <input type="text" class="form-control" id="no_of_installments" title=""
                               name="no_of_installments">
                        <div class="invalid-feedback">
                            Please provide a No of Installment.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="dac_issuance_date"><strong>DAC Issuance Date</strong></label>
                        <input type="date" class="form-control" id="dac_issuance_date" title=""
                               name="dac_issuance_date">
                        <div class="invalid-feedback">
                            Please provide a Dac Issuance Date.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="disbursement_date"><strong>DAC Disbursement Date</strong></label>
                        <input type="date" class="form-control" id="disbursement_date" title=""
                               name="disbursement_date">
                        <div class="invalid-feedback">
                            Please provide a DAC Disbursement Date.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="amount_disbursed"><strong>Amount Disbursed</strong></label>
                        <input type="number" class="form-control" id="amount_disbursed" title=""
                               name="amount_disbursed">
                        <div class="invalid-feedback">
                            Please provide a Amount Disbursed.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="expiry_date_as_per_dac"><strong>Expiry Date as per DAC</strong></label>
                        <input type="date" class="form-control" id="expiry_date_as_per_dac" title="" name="expiry_date_as_per_dac">
                        <div class="invalid-feedback">
                            Please provide a Sanctioned Date.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="mark_up_rate"><strong>Markup Rate</strong></label>
                        <input type="text" class="form-control" id="mark_up_rate" title="" name="mark_up_rate">
                        <div class="invalid-feedback">
                            Please provide a Markup Rate.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="branch_manager_name_while_sanctioning"><strong>Branch Manager Name</strong></label>
                        <input type="text" class="form-control" id="branch_manager_name_while_sanctioning" title=""
                               name="branch_manager_name_while_sanctioning">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                </div>


                <hr class="bg-danger">
                <h2 class="text-danger text-center">Installment</h2>
                <hr class="bg-danger">


                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="principle_amount"><strong>Principle Amount</strong></label>
                        <input type="text" class="form-control" name="principle_amount" id="principle_amount">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="markup_amount"><strong>Markup Amount</strong></label>
                        <input type="text" id="markup_amount" class="form-control" name="markup_amount">
                        <div class="invalid-feedback">
                            Please provide a Branch Manager Name.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="installment_insurance"><strong>Insurance (if any)</strong></label>
                        <input type="text" id="installment_insurance" class="form-control" name="installment_insurance">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="total_installment"><strong>Total Installment</strong></label>
                        <input type="text" id="total_installment" class="form-control" name="total_installment">
                    </div>
                </div>

        <hr class="bg-danger">
            <h3 class="text-center text-danger">Valuation</h3>
        <hr class="bg-danger">

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

        <button class="btn btn-primary" type="submit">Save</button>
    </form>
@endsection
