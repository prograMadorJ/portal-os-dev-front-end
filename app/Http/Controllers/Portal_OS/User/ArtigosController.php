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
            ->limit(6)
            ->orderBy('publicacao', 'desc')
        ->get();

        $rank = self::blogPanel();

        $categorias = self::categorias();

        return view('Portal_OS.pages.blog',
    		compact(
                'rank',
                'posts',
                'item',
                'categorias',
                self::loadMore()
    		)
    	);
        // ->withPosts($posts);
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

        $categorias = self::categorias();

    	return view(
            'Portal_OS.pages.post',
            compact(
                'post',
                'rank',
                'categorias'
            )
        );
    }

    public function loadMore(Request $request) {
        $processo = $this->index();
        $idArray = $processo->posts->pluck('id');
        $lastId = $idArray[5];

        $posts = Artigo::with('categorias', 'usuario', 'media')
            ->where('status', 1)
            ->where('id', '<', $lastId)
            ->orderBy('publicacao', 'desc')
            ->limit(6)
        ->get();

        $rank = $processo->rank;

        // dd(
        //     'processo', $processo,
        //     'idArray', $idArray,
        //     'lastId', $lastId,
        //     'posts', $posts,
        //     'id dos posts', $posts->pluck('id'),
        //     'rank', $rank,
        //     'id dos posts do rank', $rank->pluck('id')
        // );
        if($request->ajax()) {
            $processo = $this->loadMore();
            dd($processo);
        }

        return redirect(
            view('Portal_OS.components.blog.main.blogPost',
                compact(
                    'posts',
                    'rank'
                )
            )
        ->render());
        // compact(
        //     'posts',
        //     'rank'
        // );
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

    private function categorias() {
        return Categoria::select(
            'nome',
            'descricao',
            'slug'
        )->get();
    }
}
