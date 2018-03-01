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
use Carbon\Carbon;
use App\ArtigosEstatistica;
use App\TiposEstatistica;
use DB;

class ArtigosController extends Controller
{
    public function index() {
    	$posts = Artigo::with('categorias', 'usuario', 'media')
            ->where('status', 1)
            ->orderBy('publicacao', 'desc')
        ->paginate(6);

        return view('Portal_OS.pages.blog',
    		compact(
    			'posts',
                self::loadMore(),
                self::blogPanel()
    		)
    	);
    }

    public function categoryFilter($slug) {
        $categoria = Categoria::where('slug', $slug)->get();
        $categoriaFiltro = $categoria->pluck('id');

        $postsFiltrados = Artigo::with('categorias')
            ->where('categoria_id', '=', $categoriaFiltro)
            ->orderBy('publicacao', 'desc')
        ->get();

        $ranking = self::blogPanel();

        return view(
            'postsFiltrados',
            compact(
                'categoria',
                'categoriaFiltro',
                'postsFiltrados',
                'ranking'
            )
        );
    }

    public function showPost($slug) {
    	$post = Artigo::with('categorias')
            ->where('slug', $slug)
        ->get();
        // $ranking = $this->blogPanel();


    	return view(
            'Portal_OS.pages.post',
            compact(
                'post'
            )
        );
    }

    public static function loadMore() {
        // $range = $this->index()->count();
        // $posts = Artigo::whereNotIn('id', $range)->get();
        // dd($posts);
        // return $posts;
    }

    public static function blogPanel() {
        $artigo = Artigo::pluck('id');
        $artigoId = ArtigosEstatistica::pluck('artigo_id');
        $relacao = ArtigosEstatistica::with('artigo', 'tipos_estatisticas')->get();

        foreach($relacao->artigo as $artigoRelacionado)
        {

        }
        // dd($ranking);

        return compact(
            'artigo',
            'artigoId',
            'relacao',
            'ranking'
        );
    }
}
