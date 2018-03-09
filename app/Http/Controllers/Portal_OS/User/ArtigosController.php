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
            ->limit(6)
        ->get();

        $rank = self::blogPanel();

        return view('Portal_OS.pages.blog',
    		compact(
                'rank',
                'posts'
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

        $rank = self::blogPanel();

        return view(
            'postsFiltrados',
            compact(
                'postsFiltrados',
                'rank'
            )
        );
    }

    public function showPost($slug) {
    	$post = Artigo::with('categorias')
            ->where('slug', $slug)
        ->get();

        $rank = self::blogPanel();

    	return view(
            'Portal_OS.pages.post',
            compact(
                'post',
                'rank'
            )
        );
    }

    public function loadMore(Request $request) {
        $limit = $request->input('limit', 6);
        $skip = $request->input('skip', 6);

        $posts = Artigo::with('categorias', 'usuario', 'media')
            ->where('status', 1)
            ->orderBy('publicacao', 'desc')
            ->limit($limit)
            ->skip($skip)
        ->get();


        return view('Portal_OS.components.blog.main.blogPost',compact('posts'))->render();
    }

    public static function blogPanel() {
        $selecao = DB::table('artigos')
            ->select(DB::raw
                (
                    'count(artigos_estatisticas.id) as total, artigos.id'
                )
            )
            ->join(
                'artigos_estatisticas',
                'artigos.id',
                '=',
                'artigos_estatisticas.artigo_id',
                'inner'
            )
            ->groupBy('artigos.id')
            ->orderBy('total', 'desc')
        ->get();

        $panels = Artigo::whereIn('id', [
                $selecao[0]->id,
                $selecao[1]->id,
                $selecao[2]->id,
                $selecao[3]->id,
                $selecao[4]->id
            ])
        ->get();

        return $panels;
    }
}
