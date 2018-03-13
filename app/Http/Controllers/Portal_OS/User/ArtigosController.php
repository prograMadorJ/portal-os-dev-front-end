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

        return view('Portal_OS.pages.blog',
    		compact(
                'rank',
                'posts',
                'item',
                'categorias'
//                self::loadMore()
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

    public function showPost(Request $request, $slug) {
    	$post = Artigo::with('categorias')
            ->where('slug', $slug)
        ->get();

        $estatistica = new ArtigosEstatistica;
        $estatistica->artigo_id = $post[0]->id;
        $estatistica->cliente_ip = $request->ip();
        $estatistica->http_user_agent = $request->header('User-Agent');
        $estatistica->tipos_estatistica_id = 2;
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

    private function categorias() {
        return Categoria::select(
            'nome',
            'descricao',
            'image'
        )->get();
    }
}
