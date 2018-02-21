<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Helpers\ControllerHelper;

use App\Artigo;
use App\Categoria;
use App\Seo;
use App\Media;
use App\MediaDerivative;

class ArtigosController extends Controller
{
    public function index() {
    	// listagem simples na página inicial do blog
    	// somente pega os artigos que existem
    	$posts = Artigo::where('status', 1)->orderBy('publicacao', 'desc')->paginate(6);

    	dd($posts);

    	return view('layouts.app',
    		compact(
    			'posts'
    		)
    	);
    }

    public function categoryFilter($id) {
    	// primeiro lista a categoria, puxando a collection inteira
    	$categoriaId = Categoria::findOrFail($id);

    	// depois, a partir da collection, acessa o ID da categoria
    	// para fazer a filtragem no where() da classe Artigo
    	$categoriaFiltro = $categoriaId->id;

    	// a partir da collection, acessa o nome da categoria
    	// talvez seja usada mais pra frente, onde podemos
    	// substituir o id da categoria pelo nome na url
    	$categoriaNome = $categoriaId->nome;

    	// finalmente, a filtragem dos psots/artigos, passando
    	// o id da categoria que filtramos anteriormente
    	$postsFiltrados = Artigo::where('categoria_id', '=', $categoriaFiltro)->get();

    	dd($postsFiltrados);
    	return view('layouts.app',
    		compact(
    			'categoriaId',
    			'categoriaFiltro',
    			'categoriaNome',
    			'postsFiltrados'
    		)
    	);
    }
}
