<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class RequestStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_state', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('request_state')->insert([ 
            ['id' => 1, 'description' => 'Pendente' , 'created_at' => date("Y-m-d H:i:s")],
            ['id' => 2, 'description' => 'Entregue', 'created_at' => date("Y-m-d H:i:s")],
            ['id' => 3, 'description' => 'Devolvido', 'created_at' => date("Y-m-d H:i:s")],
            ['id' => 4, 'description' => 'Rejeitado', 'created_at' => date("Y-m-d H:i:s")],
            ['id' => 5, 'description' => 'Cancelado', 'created_at' => date("Y-m-d H:i:s")],
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
