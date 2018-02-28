
<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;
use App\Categoria;
use App\Artigo;

class Categoria_ArtigoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // vars que serão usadas na seed
        $category_id = Categoria::select('id')->first()->id or 1;
        $artigo_id = Artigo::select('id')->first()->id or 1;

        for($i = 1; $i <= 12; $i++)
        {
        	$categoria_artigo[] = [
                'categoria_id' => rand($category_id, ($category_id+5)),
                'artigo_id' => rand($artigo_id, ($artigo_id+5))
        	];
        }

        DB::table('categoria_artigo')->insert($categoria_artigo);
    }
}
