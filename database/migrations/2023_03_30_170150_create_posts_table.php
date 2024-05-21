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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unsigned()->cascadeOnDelete()->nullable();
            $table->text('post_id')->serialize()->searchable();
            $table->string('title');
            $table->text('content');
                        //location
            $table->string('post_state')->searchable();
            $table->string('post_city')->searchable();
                        //location ends
                        //Added
            $table->string('implementation')->nullable();
            $table->string('imp_email')->nullable()->unique();
            $table->string('imp_contact')->nullable();
            $table->string('prime_vendor')->nullable();
            $table->string('pv_email')->nullable()->unique();
            $table->string('pv_contact')->nullable();
            $table->string('end_client')->nullable();
            $table->string('rate')->nullable();
            $table->string('prime_rate')->nullable();
                        //Added ends
            $table->text('status');
            $table->timestamps();
        });
        Schema::table('posts', function($table) {
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
        Schema::dropIfExists('posts');
    }
};
