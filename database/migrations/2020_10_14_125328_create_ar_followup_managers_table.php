<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArFollowupManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ar_followup_managers', function (Blueprint $table) {
            $table->id();
            $table->string('short_code')->nullable();
            $table->string('status')->nullable();
            $table->string('fileid')->nullable();
            $table->string('payerid')->nullable();
            $table->string('claimid')->nullable();
            $table->string('first')->nullable();
            $table->string('last')->nullable();
            $table->string('patacctnum')->nullable();
            $table->string('fromdos')->nullable();
            $table->string('todos')->nullable();
            $table->string('totalcharge')->nullable();
            $table->string('mastervendor')->nullable();
            $table->string('statelicenseid')->nullable();
            $table->string('printclaim')->nullable();
            $table->string('insuredid')->nullable();
            $table->string('receiveddate')->nullable();
            $table->string('errordescription')->nullable();
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
        Schema::dropIfExists('ar_followup_managers');
    }
}
