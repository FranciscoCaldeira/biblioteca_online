<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('roles');
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->timestamps();
        });

        //Schema::table('roles')->dba_insert
        // DB::table('roles')->insert([ 
        //     ['id' => 1, 'description' => 'user' , 'created_at' => date("Y-m-d H:i:s")],
        //     ['id' => 2, 'description' => 'admin', 'created_at' => date("Y-m-d H:i:s")],
        //     ['id' => 3, 'description' => 'admin_super', 'created_at' => date("Y-m-d H:i:s")]
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
