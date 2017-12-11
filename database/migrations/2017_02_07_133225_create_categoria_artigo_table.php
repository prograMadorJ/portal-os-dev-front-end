<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaArtigoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_artigo', function(Blueprint $tbl) {
            $tbl->integer("categoria_id")->unsigned();
            $tbl->integer("artigo_id")->unsigned();

            $tbl->foreign('categoria_id')->on('categorias')->references("id")->onDelete('cascade');
            $tbl->foreign('artigo_id')->on('artigos')->references("id")->onDelete('cascade');
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
