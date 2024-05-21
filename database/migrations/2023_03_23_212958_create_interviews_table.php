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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->serialize()
            ->searchable()
            ->nullable();
            $table->foreignId('submission_id')
            ->serialize()
            ->searchable()
            ->nullable();
            $table->foreignId('layer_id')
            ->serialize()
            ->searchable()
            ->nullable();
            $table->text('interview_id')
            ->serialize()
            ->searchable();
            $table->dateTime('interview_date')
            ->serialize()
            ->searchable();
            $table->string('rounds_of_interview');
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('interviews', function ($table) {
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
        Schema::dropIfExists('interviews');
    }
};
