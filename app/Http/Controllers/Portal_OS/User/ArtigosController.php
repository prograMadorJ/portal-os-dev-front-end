<?php

namespace App\Http\Controllers\Portal_OS\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Helpers\ControllerHelper;

use App\Artigo;
use App\Categoria;
use App\Seo;
use App\Media;
use App\MediaDerivative;
use Carbon\Carbon;

class ArtigosController extends Controller
{
    public static function posts() {
    	// listagem simples na página inicial do blog
    	// somente pega os artigos que existem
    	$posts = Artigo::with('categorias', 'usuario', 'media')
            ->where('status', 1)
            ->orderBy('publicacao', 'desc')
            ->take(6)
        ->get();

    	return compact('posts');
    }

    public static function categoryFilter($slug) {
        // primeiro lista a categoria, puxando a collection inteira
        $categoria = Categoria::where('slug', $slug)->get();

        // depois, a partir da collection, acessa o ID da categoria
        // para fazer a filtragem no where() da classe Artigo
        $categoriaFiltro = $categoria->pluck('id');

        // finalmente, a filtragem dos psots/artigos, passando
        // o id da categoria que filtramos anteriormente
        $postsFiltrados = Artigo::with('categorias')
            ->where('categoria_id', '=', $categoriaFiltro)
            ->orderBy('publicacao', 'desc')
        ->get();

        return compact(
                'categoria',
                'slug',
                'categoriaFiltro',
                'postsFiltrados'
        );
    }

    public static function showPost($slug) {
    	$post = Artigo::with('categorias')
            ->where('slug', $slug)
        ->get();

    	return compact('post');
    }

    public static function loadMore() {
        return back();
    }
}
