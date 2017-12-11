<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposItensPermissoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos_itens_permissoes', function (Blueprint $tbl) {
            $tbl->integer('grupo_id')->unsigned();
            $tbl->integer('item_permissao_id')->unsigned();
            $tbl->timestamps();

            $tbl->foreign('grupo_id')->references("id")->on('grupos')->onDelete('cascade');
            $tbl->foreign("item_permissao_id")->on('itens_permissoes')->references('id')->onDelete('cascade');
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
