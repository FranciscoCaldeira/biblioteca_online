<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('book');
        Schema::create('book', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('author');
            $table->string('isbn');
            $table->string('resume');
            $table->integer('qntAvailable');
            $table->string('filepath');
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
        Schema::dropIfExists('book');
    }
}
