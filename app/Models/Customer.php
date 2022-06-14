<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'name',
        'son_daughter_wife',
        'gender',
        'business_department_profession',
        'designation',
        'pp_number',
        'date_of_birth',
        'office_business_address',
        'present_address',
        'permanent_address',
        'customer_cnic',
        'customer_contact_number',
        'account_cd_saving',
        'type_of_facility_approved',
        'nature_of_facility_availed',
        'renewal_enhancement_fresh_sanction',
        'amount_sanctioned',
        'amount_enhanced',
        'sanction_date',
        'tenure_of_loan_in_months',
        'installment_type',
        'no_of_installments',
        'dac_issuance_date',
        'disbursement_date',
        'amount_disbursed',
        'expiry_date_as_per_dac',
        'mark_up_rate',
        'branch_manager_name_while_sanctioning',
        'principle_amount',
        'markup_amount',
        'installment_insurance',
        'total_installment',
        'valuation_evaluator_company',
        'valuation_date_of_valuation',
    ];
}
