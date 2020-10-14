<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticeManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_managements', function (Blueprint $table) {
            $table->id();
            $table->string('practice_name')->nullable();
            $table->string('practice_npl')->nullable();
            $table->string('practice_tax_id')->nullable();
            $table->text('practice_address')->nullable();
            $table->text('billing_address')->nullable();
            $table->text('provider_name')->nullable();
            $table->text('sftp_url')->nullable();
            $table->string('sfpt_username')->nullable();
            $table->string('sftp_password')->nullable();
            $table->text('practice_file')->nullable();
            $table->string('short_code')->nullable();
            $table->string('insurance_short_code')->nullable();
            $table->text('practice_sop')->nullable();
            $table->text('rate_list')->nullable();
            $table->text('auth_shop')->nullable();
            $table->text('insurance_update')->nullable();
            $table->text('voided_check')->nullable();
            $table->text('eft')->nullable();
            $table->text('era_forms')->nullable();
            $table->text('email_updated')->nullable();
            $table->text('npi_roster')->nullable();
            $table->text('onboarding_sheet')->nullable();
            $table->text('w9')->nullable();
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
        Schema::dropIfExists('practice_managements');
    }
}
