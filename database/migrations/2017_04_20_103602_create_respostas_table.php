<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respostas', function(Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->string('cliente_ip', '15')->nullable();
            $tbl->string('http_user_agent')->nullable();
            $tbl->integer('cadastro_id')->nullable()->unsigned();
            $tbl->integer("alternativa_id")->unsigned();
            $tbl->timestamps();

            $tbl->foreign('cadastro_id')->on('cadastros')->references('id')->onDelete('set null');
            $tbl->foreign('alternativa_id')->on('alternativas')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('respostas');
    }
}
