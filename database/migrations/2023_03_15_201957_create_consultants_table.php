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
        Schema::create('consultants', function (Blueprint $table) {
            $table->id();
            $table->text('consultant_id')->searchable();
            $table->foreignId('user_id')->unsigned()->nullable();
            $table->string('consultant_name');
            $table->string('profile_given_by')->searchable();
            $table->string('con_contact_number');
            $table->string('con_email');
            $table->string('experience');
            $table->string('state');
            $table->string('city');
            $table->string('visa');
            $table->date('dob');
            $table->string('linkedin')->nullable();
            $table->string('education');
            $table->string('catagory');
            $table->string('status');
            $table->text('image')->nullable();
            $table->text('con_cv')->nullable();
            $table->timestamps();
            $table->string('company_name');
            $table->string('comp_email');
            $table->string('recruiter_name');
            $table->string('phone_number');
            $table->string('extension')->nullable();
            $table->string('bench_rate')->nullable();
            $table->text('is_verified');
        });
        Schema::table('consultants', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultants');
    }
};
