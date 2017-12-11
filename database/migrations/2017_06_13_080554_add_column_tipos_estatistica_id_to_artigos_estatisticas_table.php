<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTiposEstatisticaIdToArtigosEstatisticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artigos_estatisticas', function(Blueprint $tbl) {
            $tbl->integer('tipos_estatistica_id')->unsigned()->nullable();
            $tbl->foreign('tipos_estatistica_id')
                ->references('id')
                ->on('tipos_estatisticas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
