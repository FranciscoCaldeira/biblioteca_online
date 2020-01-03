<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('request');
        Schema::create('request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');         
            $table->unsignedBigInteger('request_state_id');         
            $table->foreign('user_id')->references('id')->on('users')->onCascade('delete');
            $table->foreign('book_id')->references('id')->on('book')->onCascade('delete');
            $table->foreign('request_state_id')->references('id')->on('request_state')->onCascade('delete');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request');
    }
}
