<?php

use Illuminate\Database\Seeder;

class TiposEstatisticasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //campos
        // id, nome, created_at, updated_at
         DB::table('tipos_estatisticas')->insert(
         	// [
	         //     'nome' => 'Click'
       	 	// ],
       	 	[
       	 		'nome' => 'View'
       	 	]
       	 );
    }
}
