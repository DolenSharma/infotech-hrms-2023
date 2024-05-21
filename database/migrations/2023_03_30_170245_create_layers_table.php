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
        Schema::create('layers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('interview_id')->nullable();
            $table->foreignId('consultant_id')->unsigned()->nullable();
            $table->foreignId('user_id')->unsigned()->nullable();
            $table->foreignId('bdmpost_id')->unsigned()->cascadeOnDelete()->nullable();
            $table->string('candidate_name');
            $table->text('layer_id');
            $table->string('layer_rate');
            $table->string('layer_basis');
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
        Schema::dropIfExists('layers');
    }
};
