<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // campos
        // id, nome(NOT NULL), descricao(NOT NULL), url(NOT NULL), status(NOT NULL, Default 1), link_titulo, created_at, updated_at, categoria_id, seo_id

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $categorias = [];
        $faker = Factory::create();
        $date = new Carbon();
        $categorias_nome = ['ouvido','garganta','pescoço','nariz','saúde'];
        $clip = ['clip-boneco-ouvido','clip-boneco-garganta','clip-boneco-pescoco','clip-boneco-nariz','clip-boneco-saude'];

        for($i = 0; $i < 5; $i++)
	    {
	    	$createdAt = new Carbon;
	    	$updatedAt = clone($createdAt);

    	    $categorias[] = [
    			'nome' => $categorias_nome[$i],
    			'descricao' => $faker->sentence(rand(1, 4)),
    			'url' => $faker->word(),
    			'status' => 1,
    			'link_titulo' => $categorias_nome[$i],
    			'created_at' => $createdAt,
    			'updated_at' => $updatedAt,
    			'categoria_id' => $i + 1,
    			'seo_id' => NULL,
                'slug' => $clip[$i]
    	    ];
    	}

        DB::table('categorias')->insert($categorias);
    }
}
