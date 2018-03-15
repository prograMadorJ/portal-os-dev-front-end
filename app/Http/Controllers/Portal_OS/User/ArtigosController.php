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
use App\ArtigosEstatistica as ArtigosEstatistica;
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

        $categorias = $this->categorias();

        $category = 'todos';

        return view('Portal_OS.pages.blog',
    		compact(
                'rank',
                'posts',
                'item',
                'categorias',
                'category'
    		)
    	);
    }

    public function categoryFilter($slug) {
        $categoria = Categoria::where('slug', $slug)->get();
        $categoriaFiltro = $categoria->pluck('id');
        $categoriaQuery = $categoriaFiltro[0];

        $posts = Artigo::with('categorias', 'usuario', 'media')
            ->whereHas('categorias',function($q) use($categoriaQuery){
                $q->where('id', '=', $categoriaQuery);
            })
            ->orderBy('publicacao', 'desc')
            ->limit(6)
        ->get();

        $rank = self::blogPanel();

        $categorias = self::categorias();

        $category = $slug;

        return view(
            'Portal_OS.pages.blog',
            compact(
                'posts',
                'rank',
                'categorias',
                'category'
            )
        );
    }

    public function showPost(Request $request, $slug) {
    	$post = Artigo::with('categorias')
            ->where('url', $slug)
        ->get();

        $estatistica = new ArtigosEstatistica;
        $estatistica->artigo_id = $post[0]->id;
        $estatistica->cliente_ip = $request->ip();
        $estatistica->http_user_agent = $request->header('User-Agent');
        $estatistica->tipos_estatistica_id = 1;
        $estatistica->save();

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

    public function loadMore(Request $request, $slug) {
        $limit = $request->input('limit', 6);
        $skip = $request->input('skip', 6);
        $prefix = $request->input('prefix');
        $category = $request->input('categoria');
        dump(
            "limit", $limit,
            "skip", $skip,
            "prefix", $prefix,
            "category", $category
        );
        if(isset($category) && $category == 'todos') {
            $posts = Artigo::with('categorias', 'usuario', 'media')
                ->where('status', 1)
                ->orderBy('publicacao', 'desc')
                ->limit($limit)
                ->skip($skip)
            ->get();
        } else if(isset($category)) {
            $categoria = Categoria::where('slug', $slug)->get();
            $categoriaFiltro = $categoria->pluck('id');
            $categoriaQuery = $categoriaFiltro[0];

            $posts = Artigo::with('categorias', 'usuario', 'media')
                ->whereHas('categorias',function($q) use($categoriaQuery){
                    $q->where('id', '=', $categoriaQuery);
                })
                ->orderBy('publicacao', 'desc')
                ->limit($limit)
                ->skip($skip)
            ->get();
        }

        return view(
            'Portal_OS.components.blog.main.blogPost',
            compact(
                'posts',
                'category'
            )
        )->render();
    }

    public function loadMoreFilterCategories(Request $request) {

        $categoria = Categoria::where('slug', $slug)->get();
        $categoriaFiltro = $categoria->pluck('id');
        $categoriaQuery = $categoriaFiltro[0];

        $limit = $request->input('limit', 6);
        $skip = $request->input('skip', 6);

        $posts = Artigo::with('categorias', 'usuario', 'media')
            ->whereHas('categorias',function($q) use($categoriaQuery){

                $q->where('id', '=', $categoriaQuery);
            })
            ->orderBy('publicacao', 'desc')
            ->limit($limit)
            ->skip($skip)
        ->get();

        return view(
            'Portal_OS.components.blog.main.blogPost',
            compact(
                'posts'
            )
        )->render();
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

    private function categorias() {
        return Categoria::select(
            'nome',
            'descricao',
            'image'
        )->get();
    }
}
