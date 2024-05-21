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
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->serialize()->searchable();
            $table->text('referral_id')->serialize()->searchable();
            $table->string('post_id')->nullable();
            $table->string('email_id')->unique();
            $table->string('contact_number')->nullable();
            $table->string('company_name')->nullable();
            $table->text('ref_cv')->nullable();
        });
        Schema::table('referrals', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.s
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referrals');
    }
};
