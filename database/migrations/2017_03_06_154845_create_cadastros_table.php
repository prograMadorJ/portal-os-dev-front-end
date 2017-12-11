<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadastrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadastros', function(Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->string('nome', 100)->nullable();
            $tbl->string('email', 100)->nullable();
            $tbl->string('telefone', 20);
            $tbl->string('assunto')->nullable();
            $tbl->text('conteudo')->nullable();
            $tbl->integer('cidade')->nullable();
            $tbl->integer('uf')->nullable();
            $tbl->string('cliente_ip','15')->nullable();
            $tbl->string('http_user_agent')->nullable();
            $tbl->string('page_origin')->nullable();
            $tbl->integer('is_spam')->default(0);
            $tbl->integer('status')->default(1);
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
        //
    }
}
