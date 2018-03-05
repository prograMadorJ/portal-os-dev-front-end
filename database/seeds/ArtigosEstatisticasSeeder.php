<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory;

use App\Artigo;
use App\TiposEstatistica;

class ArtigosEstatisticasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //campos
        // id, artigo_id, cliente_ip, http_user_agent, created_at, updated_at, tipos_estatistica_id

        $dados = [];
        $date = new Carbon();
        $faker = Factory::create();
        $tipoEstatisticaId = TiposEstatistica::select('id')->first()->id or 2;
        $ip = request()->ip();
        $agent = request()->header('User-Agent');
        $counter = Artigo::count();

        for($i = 1; $i <  $counter; $i++)
        {
	        $dados[] = [
	        	'artigo_id' => rand(1, $counter),
	        	'cliente_ip' => $ip,
	        	'http_user_agent' => $agent,
	        	'created_at' => clone($date),
	        	'updated_at' => clone($date),
	        	'tipos_estatistica_id' => $tipoEstatisticaId,
	        ];
    	}

    	DB::table('artigos_estatisticas')->insert($dados);
    }
}
