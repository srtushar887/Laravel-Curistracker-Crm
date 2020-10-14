<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebPortalManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_portal_managers', function (Blueprint $table) {
            $table->id();
            $table->string('short_code')->nullable();
            $table->text('facility_name')->nullable();
            $table->text('ins_name')->nullable();
            $table->text('status')->nullable();
            $table->text('web_link')->nullable();
            $table->text('user_name')->nullable();
            $table->text('pass_word')->nullable();
            $table->text('security_questions_answers')->nullable();
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
        Schema::dropIfExists('web_portal_managers');
    }
}
