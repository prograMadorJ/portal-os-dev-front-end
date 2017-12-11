<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalScriptsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('local_scripts', function(Blueprint $tbl) {
          $tbl->increments('id');
          $tbl->integer('local_id')->unsigned();
          $tbl->integer('script_id')->unsigned();
          $tbl->foreign('local_id')->references('id')->on('local')->onDelete('cascade');
          $tbl->foreign('script_id')->references('id')->on('scripts')->onDelete('cascade');
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
