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

        $panel = $this->blogPanel();

        return view('Portal_OS.pages.blog',
    		compact(
    			'posts',
                self::loadMore(),
                'panel'
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
        // dd($range);
        // return $posts;
    }

    public function blogPanel() {
        // select count(artigos_estatisticas.id) as total,artigos.id from artigos inner join artigos_estatisticas on artigos.id = artigos_estatisticas.artigo_id GROUP BY artigos.id order by total desc;
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

        // gambiarra por ora
        $panelUm = Artigo::where('id', $selecao[0]->id)->pluck('titulo');
        $panelDo = Artigo::where('id', $selecao[1]->id)->pluck('titulo');
        $panelTr = Artigo::where('id', $selecao[2]->id)->pluck('titulo');
        $panelQt = Artigo::where('id', $selecao[3]->id)->pluck('titulo');
        $panelCi = Artigo::where('id', $selecao[4]->id)->pluck('titulo');

        return compact(
            'panelUm',
            'panelDo',
            'panelTr',
            'panelQt',
            'panelCi'
        );
    }
}
