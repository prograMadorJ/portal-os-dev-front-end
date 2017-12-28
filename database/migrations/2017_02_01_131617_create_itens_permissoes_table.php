<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItensPermissoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_permissoes', function (Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->string('metodo', '100');
            $tbl->integer('permissao_id')->unsigned();
            $tbl->integer('status')->default(1);
            $tbl->timestamps();

            $tbl->foreign('permissao_id')->on('permissoes')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('itens_permissoes');
    }
}
