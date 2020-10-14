<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimDepositManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_deposit_managers', function (Blueprint $table) {
            $table->id();
            $table->string('payer')->nullable();
            $table->string('check_date')->nullable();
            $table->string('check_date_order')->nullable();
            $table->string('deposit_check_id')->nullable();
            $table->string('amount')->nullable();
            $table->text('file_name')->nullable();
            $table->string('claims')->nullable();
            $table->string('npl')->nullable();
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
        Schema::dropIfExists('claim_deposit_managers');
    }
}
