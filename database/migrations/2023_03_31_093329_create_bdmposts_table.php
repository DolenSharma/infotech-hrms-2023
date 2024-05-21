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
        Schema::create('bdmposts', function (Blueprint $table) {
            $table->id();
            $table->text('bdmpost_id')->serialize()->searchable();
            $table->foreignId('user_id')->unsigned()->cascadeOnDelete()->nullable();
            $table->foreignId('consultant_id')->unsigned()->cascadeOnDelete()->required();
            $table->foreignId('post_id')->unsigned()->cascadeOnDelete()->required();
            $table->foreignId('interview_id')->unsigned()->cascadeOnDelete()->required();
            $table->foreignId('submission_id')->unsigned()->cascadeOnDelete()->required();
            $table->string('dbm_current_user_name')->searchable();//Poster name from observers(current user)
            $table->string('bdm_role')->searchable();
            $table->text('layer_jd');
            $table->string('visa_required')->searchable()->nullable();
            $table->string('bdm_postion')->searchable()->nullable();
            //location
            $table->string('bdm_state')->searchable();
            $table->string('bdm_city')->searchable();
            //location ends
            $table->string('max_rate')->searchable();
            //Added
            $table->string('implementation')->nullable();
            $table->string('imp_email')->nullable()->unique();
            $table->string('imp_contact')->nullable();
            $table->string('pv_name')->nullable()->searchable();
            $table->string('pv_email')->nullable()->unique();
            $table->string('pv_contact')->nullable();
            $table->string('layer_name')->nullable();
            $table->string('layer_email')->nullable()->unique();
            $table->string('layer_contact')->nullable();
            $table->string('layer_recruiter');
            //Added ends
            $table->string('bdm_status')->searchable();
            $table->string('bdm_client')->searchable();
            $table->string('bdm_submission')->searchable();
            $table->text('bdm_jd')->searchable();
            $table->timestamps();
        });

        Schema::table('bdmposts', function ($table) {
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
        Schema::dropIfExists('bdmposts');
    }
};
