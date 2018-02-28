<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class ArtigoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // vars que serão usadas na seed
        $artigos = [];
        $faker = Factory::create();
        $date = new Carbon();

        // gerar 12 posts
        // campos
        // id, titulo, resumo(nullable), conteudo, seo_id(nullable),url, link_titulo(nullable), publicacao, agendado, user_id(nullable), media_id(nullable), status(default 1), created_at(nullable), updated_at(nullable)
        for($i = 1; $i <= 12; $i++)
        {
        	$publishedDate = clone($date);
        	$scheduledDate = clone($date);
        	$createdDate = clone($date);
        	$updatedDate = clone($date);

        	$posts[] = [
        		'titulo' => $faker->sentence(rand(4, 7)),
        		'resumo' => $faker->sentence(rand(10, 25)),
        		'conteudo' => $faker->paragraphs(rand(8, 20), true),
        		'seo_id' => NULL,
        		'url' => $faker->sentence(),
        		'link_titulo' => NULL,
        		'publicacao' => $publishedDate,
        		'agendado' => $scheduledDate,
        		'user_id' => 1,
        		'media_id' => NULL,
        		'status' => 1,
        		'created_at' => $createdDate,
        		'updated_at' => $updatedDate,
                'categoria_id' => rand(1, 6)
        	];
        }

        DB::table('artigos')->insert($posts);
    }
}
