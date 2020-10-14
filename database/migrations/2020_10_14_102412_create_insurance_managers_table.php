<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_managers', function (Blueprint $table) {
            $table->id();
            $table->string('short_code')->nullable();
            $table->string('insurance_name')->nullable();
            $table->string('insurance_no')->nullable();
            $table->string('facsimile_no')->nullable();
            $table->string('payer_id')->nullable();
            $table->string('tfl_days')->nullable();
            $table->string('appeal_limit')->nullable();
            $table->string('mailing_address')->nullable();
            $table->string('custom_1')->nullable();
            $table->string('custom_2')->nullable();
            $table->string('custom_3')->nullable();
            $table->string('custom_4')->nullable();
            $table->string('custom_5')->nullable();
            $table->integer('idcs')->nullable();
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
        Schema::dropIfExists('insurance_managers');
    }
}
