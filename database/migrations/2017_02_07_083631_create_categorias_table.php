<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->string('nome', '100')->unique();
            $tbl->text('descricao');
            $tbl->string('url');
            $tbl->integer('status')->default(1);
            $tbl->string('link_titulo')->nullable();
            $tbl->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categorias');
    }
}
