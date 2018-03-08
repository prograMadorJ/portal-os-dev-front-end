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
        // $mais = $this->loadMore(Request::class );
        return view('Portal_OS.pages.blog',
    		compact(
                'rank',
                'posts'
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

        // dd(
        //     "input skip com 6", $request->input('skip', '6'),
        //     "input limit com 6", $request->input('limit', '6'),
        //     "input limit sem 6", $request->input('limit'),
        //     "input skip sem 6", $request->input('skip'),
        //     "query skip sem 6", $request->query('skip'),
        //     "query limit sem 6", $request->query('limit'),
        //     "query skip com 6", $request->query('skip', '6'),
        //     "query limit com 6", $request->query('limit', '6'),
        //     "path url", $request->path(),
        //     "all request", $request->all(),
        //     "limit var", $limit,
        //     "skip var", $skip
        // );

        $posts = Artigo::with('categorias', 'usuario', 'media')
            ->where('status', 1)
            ->orderBy('publicacao', 'desc')
            ->limit($limit)
            ->skip($skip)
        ->get();


        return json_decode($posts);
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
}
