
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
        $catCount = Categoria::count();

        $artigo_id = Artigo::select('id')->first()->id or 1;
        $artigoCount = Artigo::count();

        for($i = 1; $i <= $artigoCount; $i++)
        {
        	$categoria_artigo[] = [
                'categoria_id' => rand($category_id, $catCount),
                'artigo_id' => rand($artigo_id, $artigoCount)
        	];
        }

        DB::table('categoria_artigo')->insert($categoria_artigo);
    }
}
