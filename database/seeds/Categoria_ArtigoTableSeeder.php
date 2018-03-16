
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
        $cont_categoria = $category_id;

        for($i = 1; $i <= $artigoCount; $i++)
        {
            if($cont_categoria > $catCount)
                $cont_categoria = $category_id;

        	$categoria_artigo[] = [
                'categoria_id' => $cont_categoria++,
                'artigo_id' => $i
        	];
        }

        DB::table('categoria_artigo')->insert($categoria_artigo);
    }
}
