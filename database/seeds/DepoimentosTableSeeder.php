<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class DepoimentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $faker = Factory::create();
        $date = new Carbon();

        for($i = 0; $i < 6; $i++)
	    {
	    	$createdAt = new Carbon;
	    	$updatedAt = clone($createdAt);

    	    $depoimentos[] = [
    			'nome' => $faker->name(),
    			'local' => $faker->city(),
    			'titulo' => $faker->word(),
    			'conteudo' => $faker->paragraph(10),
    			'media_id' => 1,
    			'ordem' => $i + 1,
    			'destaque' => $i + 1,
    			'status' => 1,
    			'created_at' => $createdAt,
    			'updated_at' => $updatedAt
    	    ];
    	}

        DB::table('depoimentos')->insert($depoimentos);
    }
}
