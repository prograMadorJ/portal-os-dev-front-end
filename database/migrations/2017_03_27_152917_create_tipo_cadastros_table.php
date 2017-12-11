<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoCadastrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_cadastros', function(Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->string('descricao');
            $tbl->integer('status')->default(1);
            $tbl->timestamps();
        });

        Schema::table('cadastros', function(Blueprint $tbl) {
            $tbl->integer('tipo_cadastro_id')->unsigned()->nullable();
            $tbl->integer('id_fonoaudiologo_indicador')->nullable();

            $tbl->foreign('tipo_cadastro_id')->on('tipo_cadastros')->references('id')->onDelete('set null');
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
