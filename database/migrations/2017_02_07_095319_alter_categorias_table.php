<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categorias',  function(Blueprint $tbl) {
            $tbl->integer('categoria_id')->unsigned()->nullable();
            $tbl->integer('seo_id')->unsigned()->nullable();

            $tbl->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null');
            $tbl->foreign('seo_id')->references('id')->on('seos')->onDelete('set null');
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
