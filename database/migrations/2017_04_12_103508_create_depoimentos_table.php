<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepoimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depoimentos', function(Blueprint $tbl) {
            $tbl->increments("id");
            $tbl->string('nome', '100');
            $tbl->string('local', '100');
            $tbl->string('titulo', '100');
            $tbl->text('conteudo');
            $tbl->integer('media_id')->nullable()->unsigned();
            $tbl->integer('ordem')->default(0);
            $tbl->integer('destaque')->default(0);
            $tbl->integer('status')->default(0);
            $tbl->timestamps();
            $tbl->foreign('media_id')->on('media')->references('id')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('depoimentos');
    }
}
