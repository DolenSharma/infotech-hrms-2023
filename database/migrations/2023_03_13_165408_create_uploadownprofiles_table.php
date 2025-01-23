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
        Schema::create('uploadownprofiles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->searchable();
            $table->text('uploadownprofile_id')->searchable();
            $table->foreignId('post_id')->searchable();
            $table->string('own_prof_name')->searchable();
            $table->string('email_id')->unique();
            $table->string('contact_number')->searchable();
            $table->string('state')->searchable();
            $table->string('city')->searchable();
            $table->string('visa_status')->searchable();
            $table->text('photo');
            $table->text('driving_license')->nullable();
            $table->text('uploaded_cv')->nullable();
        });

        Schema::table('uploadownprofiles', function($table) {
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
        Schema::dropIfExists('Uploadownprofiles');
    }
};
