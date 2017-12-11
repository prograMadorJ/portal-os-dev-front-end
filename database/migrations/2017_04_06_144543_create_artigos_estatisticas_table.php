<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtigosEstatisticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigos_estatisticas', function(Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->integer('artigo_id')->unsigned();
            $tbl->string('cliente_ip','15')->nullable();
            $tbl->string('http_user_agent')->nullable();
            $tbl->timestamps();

            $tbl->foreign('artigo_id')->references('id')->on('artigos')->onDelete('cascade');
        });
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
