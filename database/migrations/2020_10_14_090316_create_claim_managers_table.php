<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_managers', function (Blueprint $table) {
            $table->id();
            $table->text('file_name')->nullable();
            $table->string('npl')->nullable();
            $table->string('check_date')->nullable();
            $table->string('patient_id')->nullable();
            $table->string('last_name_first_name')->nullable();
            $table->string('status_1')->nullable();
            $table->string('payer')->nullable();
            $table->string('payer_claim_control_number')->nullable();
            $table->string('svc_date')->nullable();
            $table->string('cpt')->nullable();
            $table->string('charge_amount_2')->nullable();
            $table->string('payment_amount_2')->nullable();
            $table->string('group_name')->nullable();
            $table->string('adj_amount')->nullable();
            $table->text('translated_reason_code')->nullable();
            $table->string('idcs')->nullable();
            $table->string('invoice_date')->nullable();
            $table->string('invoice_name')->nullable();
            $table->string('issue_code')->nullable();
            $table->string('action_code')->nullable();
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
        Schema::dropIfExists('claim_managers');
    }
}
