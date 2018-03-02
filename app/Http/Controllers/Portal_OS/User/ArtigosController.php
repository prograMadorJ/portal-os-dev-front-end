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

        $rank = self::blogPanel();

        return view('Portal_OS.pages.blog',
    		compact(
    			'posts',
                'rank',
                'item',
                self::loadMore()
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
                'categoria',
                'categoriaFiltro',
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

    public static function loadMore() {
        // $range = $this->index()->count();
        // $posts = Artigo::whereNotIn('id', $range)->get();
        // dd($range);
        // return $posts;
    }

    public static function blogPanel() {
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
