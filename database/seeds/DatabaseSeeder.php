<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('grupos')->insert([
        //         'nome' => 'Admin',
        //         'status' => 1,
        //     ]);
        // DB::table('users')->insert([
        // 		'name' => 'Jean TI',
        // 		'email' => 'jean.mfdias@direitodeouvir.com.br',
        // 		'password' => bcrypt('12345678'),
        //         'grupo_id' => 1,
        //         'status' => 1,
        // 	]);

        // // Tipo de Cadastro
        // DB::table('tipo_cadastros')->insert([
        //   'descricao' => 'Paciente'
        // ]);
        // DB::table('tipo_cadastros')->insert([
        //   'descricao' => 'Fonoaudiologo'
        // ]);

        // // Tipo de Media
        // DB::table('tipo_media')->insert([
        //   'descricao' => 'Imagem'
        // ]);
        // DB::table('tipo_media')->insert([
        //   'descricao' => 'Vídeo'
        // ]);
        // DB::table('tipo_media')->insert([
        //   'descricao' => 'Áudio'
        // ]);
        // DB::table('tipo_media')->insert([
        //   'descricao' => 'Documento'
        // ]);

        // // Local
        // DB::table('local')->insert([
        //     'descricao' => 'Home'
        // ]);
        // DB::table('local')->insert([
        //     'descricao' => 'Produto'
        // ]);

        // // Teste
        // DB::table('testes')->insert([
        //     'nome' => 'Teste Auditivo'
        // ]);

//         $this->call(SeosTableSeeder::class);
//         $this->call(MediaTableSeeder::class);
          $this->call(CategoriasTableSeeder::class);
          $this->call(ArtigoTableSeeder::class);
         $this->call(Categoria_ArtigoTableSeeder::class);
         $this->call(DepoimentosTableSeeder::class);
         $this->call(TiposEstatisticasSeeder::class);
         $this->call(ArtigosEstatisticasSeeder::class);

    }
}
