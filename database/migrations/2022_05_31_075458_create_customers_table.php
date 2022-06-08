<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('region', 10)->nullable();
            $table->string("zone", 15)->nullable();
            $table->string("district", 25)->nullable();
            $table->string("branch", 30)->nullable();
            $table->string('name')->nullable();
            $table->string('son_daughter_wife', 20)->nullable();
            $table->string('gender', 6)->nullable();
            $table->string('business_department_profession', 50)->nullable();
            $table->string('designation', 40)->nullable();
            $table->string('pp_number', 15)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('office_business_address')->nullable();
            $table->text('present_address', 5)->nullable();
            $table->text('permanent_address', 5)->nullable();
            $table->string('customer_cnic', 15)->nullable();
            $table->string('customer_contact_number', 20)->nullable();
            // this must include branch code....
            $table->string('account_cd_saving', 20)->nullable();
            // Facility detail
            $table->string('nature_of_facility_availed')->nullable();
            $table->string('type_of_facility_approved')->nullable();
            $table->string('renewal_enhancement_fresh_sanction')->nullable();
            $table->string('amount_sanctioned')->nullable();

            $table->string('amount_enhanced')->nullable();
            $table->date('sanction_date')->nullable();
            $table->integer('tenure_of_loan_in_months')->nullable();
            //monthly_quarterly_lump_sump
            $table->string('installment_type')->nullable();

            $table->string('no_of_installments')->nullable();
            $table->date('dac_issuance_date')->nullable();
            $table->date('disbursement_date')->nullable();
            $table->decimal('amount_disbursed',10,2)->nullable();

            $table->date('expiry_date_as_per_dac')->nullable();
            $table->date('mark_up_rate')->nullable();
            $table->date('branch_manager_name_while_sanctioning')->nullable();
            // installment
            $table->string('principle_amount')->nullable();
            $table->string('markup_amount')->nullable();
            $table->string('installment_insurance')->nullable();
            $table->string('total_installment')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
