@extends('theme.main')
@section('breadcrumb')
    Borrower Profile / Claim Outstanding
@endsection
@section('body')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form method="post" action="{{route('insuranceClaim.store', $customer->id)}}">
        @csrf
        @include('theme.customer')

        <br>

        <div class="form-row">
            <div class="col-md-4 mb-2">
                <label for="insurance_id"><strong>Insurance Company</strong></label>
                <select class="form-control" id="insurance_id" style="width: 100%;" name="insurance_id" required>
                    <option value="">None</option>
                    @foreach($customer->insurance as $inc)
                        <option value="{{$inc->id}}">{{$inc->insurance_company}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-2">
                <label for="claim_amount"><strong>Claim Amount</strong></label>
                <input type="number" min="0.00" step="0.01" class="form-control" id="claim_amount" title="" name="claim_amount">
            </div>
            <div class="col-md-4 mb-3">
                <label for="date_of_claim"><strong>Date of Claim</strong></label>
                <input type="date" class="form-control" id="date_of_claim" name="date_of_claim">
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

        <button class="btn btn-primary float-right" type="submit">Save</button>
    </form>

    <br>
    @if($customer->insurance->isNotEmpty())
        <h2 class="text-center" style="border-top: 1px solid red; border-bottom: 1px solid red; padding: 10px; margin-bottom: 30px; margin-top: 30px;">
            Claim Outstanding
        </h2>
        <table class="table table-bordered border-collapse">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Insurance Company</th>
                <th scope="col">Claim Amount</th>
                <th scope="col">Date of Claim</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customer->claim_outstanding as $co)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{\App\Models\Insurance::find($co->insurance_id)->insurance_company}}</td>
                    <td>{{$co->claim_amount}}</td>
                    <td>{{\Carbon\Carbon::parse($co->date_of_claim)->format('d-m-Y')}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif

@endsection
