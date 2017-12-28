<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local', function(Blueprint $tbl) {
          $tbl->increments("id");
          $tbl->string('name', '100')->nullable();
          $tbl->string("descricao", '100');
          $tbl->integer('status')->default(1);
          $tbl->timestamps();
        });

        Schema::table('banners', function(Blueprint $tbl) {
          $tbl->foreign('local_id')->on('local')->references('id')->onDelete('set null');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('local');
    }
}
