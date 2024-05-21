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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('interview_id')->nullable();
            $table->text('submission_id')->serialize()->searchable();
            $table->foreignId('user_id')->unsigned()->cascadeOnDelete()->nullable();
            $table->foreignId('consultant_id')->unsigned()->cascadeOnDelete()->required();
            $table->foreignId('post_id')->unsigned()->cascadeOnDelete()->required();
            $table->string('current_user_name')->searchable();//recruiter name from observers(current user)
            $table->string('job_title')->searchable();
            $table->string('state')->searchable()->nullable();
            $table->string('city')->searchable()->nullable();
            $table->string('rate')->nullable();
            $table->string('sub_basis')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
        Schema::table('submissions', function ($table) {
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
        Schema::dropIfExists('submissions');
    }
};
