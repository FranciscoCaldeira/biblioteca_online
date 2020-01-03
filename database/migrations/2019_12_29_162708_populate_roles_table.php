<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class PopulateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('roles')->insert([ 
            ['id' => 1, 'description' => 'User' , 'created_at' => date("Y-m-d H:i:s")],
            ['id' => 2, 'description' => 'Admin', 'created_at' => date("Y-m-d H:i:s")],
            ['id' => 3, 'description' => 'Super Admin', 'created_at' => date("Y-m-d H:i:s")]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
