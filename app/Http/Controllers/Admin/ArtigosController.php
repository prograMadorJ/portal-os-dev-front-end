<?php

namespace App\Http\Controllers\Admin;

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

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        if (!\Auth::user()->pode('Artigo', 'index')) return redirect('/');

        $artigos = new Artigo();
        $artigos = ControllerHelper::filtros($artigos, ['titulo' => 'string', 'id' => 'integer']);
        if (isset($_GET['size'])) {
            $artigos = $artigos->orderBy('imagem_tamanho', 'DESC')->paginate(10);
        } elseif (isset($_GET['meta_titulo'])) {
            if ($_GET['meta_titulo'] == 'A') {
                $artigos = $artigos->select('artigos.*')
                    ->join('seos', 'artigos.seo_id', '=', 'seos.id')
                    ->where(\DB::raw('length(seos.meta_titulo)'), '<', (74*0.7))->paginate(10);
            } elseif ($_GET['meta_titulo'] == 'M') {
                $artigos = $artigos->select('artigos.*')
                    ->join('seos', 'artigos.seo_id', '=', 'seos.id')
                    ->where(\DB::raw('length(seos.meta_titulo)'), '>=', (74*0.7))
                    ->where(\DB::raw('length(seos.meta_titulo)'), '<', (74-15))->paginate(10);
            }
        } elseif (isset($_GET['meta_descricao'])) {
            if ($_GET['meta_descricao'] == 'A') {
                $artigos = $artigos->select('artigos.*')
                    ->join('seos', 'artigos.seo_id', '=', 'seos.id')
                    ->where(\DB::raw('length(seos.meta_descricao)'), '<', (156*0.7))->paginate(10);
            } elseif ($_GET['meta_descricao'] == 'M') {
                $artigos = $artigos->select('artigos.*')
                    ->join('seos', 'artigos.seo_id', '=', 'seos.id')
                    ->where(\DB::raw('length(seos.meta_descricao)'), '>=', (156*0.7))
                    ->where(\DB::raw('length(seos.meta_descricao)'), '<', (156-15))->paginate(10);
            }
        } else {
            $artigos = $artigos->orderBy('id', 'DESC')->paginate(10);
        }
        return View('Admin.artigos.index', compact('artigos'));
    }

    public function create() {
      if (!\Auth::user()->pode('Artigo', 'create')) return redirect('/');

    	$categorias = Categoria::orderBy('nome', 'asc')->get();
        $media = Media::whereNotIn('id', MediaDerivative::select('media_id')->get())
            ->where('tipo_media_id', 1)
            ->orderBy('id', 'desc')->get();
        $artigo = null;
    	return View("Admin.artigos.create", compact('categorias', 'artigo', 'media'));
    }

    public function store(Request $request) {
        if (!\Auth::user()->pode('Artigo', 'create')) return redirect('/');

    	$this->validate($request, Artigo::rules());
    	$data = $request->all();
        // SEO
        $seo = Seo::create($data['seo']);
        if ($seo) {
            $data['seo_id'] = $seo->id;
        }
        // Datas
        if (!isset($data['publicacao']))
            $data['publicacao'] = date('Y-m-d H:i:s');
        if (!isset($data['agendado']))
            $data['agendado'] = date('Y-m-d H:i:s');

        $data['user_id'] = \Auth::user()->id;
    	$artigo = Artigo::create($data);
    	$artigo->categorias()->attach($data['categorias']);
    	return redirect(action('Admin\ArtigosController@show', $artigo->id));
    }

    public function show($id) {
        if (!\Auth::user()->pode('Artigo', 'show')) return redirect('/');

    	$artigo = Artigo::find($id);
    	return View('Admin.artigos.show', compact('artigo'));
    }

    public function edit($id) {
        if (!\Auth::user()->pode('Artigo', 'edit')) return redirect('/');

    	$categorias = Categoria::orderBy('nome', 'asc')->get();
        $artigo = Artigo::find($id);
        $media = Media::whereNotIn('id', MediaDerivative::select('media_id')->get())
            ->where('tipo_media_id', 1)
            ->orderBy('id', 'desc')->get();
    	return View('Admin.artigos.edit', compact('categorias', 'artigo', 'media'));
    }

    public function update(Request $request, $id) {
        if (!\Auth::user()->pode('Artigo', 'edit')) return redirect('/');

        $artigo = Artigo::find($id);
    	$this->validate($request, Artigo::rules('PATCH', $id));
    	$data = $request->all();
        // SEO
        $seo = $artigo->seo;
        if ($seo)
            $seo->fill($data['seo'])->save();
        else {
            $seo = Seo::create($data['seo']);
            $data['seo_id'] = $seo->id;
        }
        // Datas
        if (!isset($data['publicacao'])) {
            $data['publicacao'] = $artigo->publicacao;
        }
        if (!isset($data['agendado'])) {
            $data['agendado'] = $artigo->agendado;
        }
        if ($data['media_id'] != null) {
            $data['imagem'] = null;
            $data['imagem_tamanho'] = null;
            $data['imagem_titulo'] = null;
        }
        $artigo->fill($data)->save();
    	$artigo->categorias()->sync($data['categorias']);
    	return redirect(action('Admin\ArtigosController@show', $id));
    }

    public function destroy($id) {
        if (!\Auth::user()->pode('Artigo', 'destroy')) return redirect('/');

    	$artigo = Artigo::find($id);
        if ($artigo) {
            $artigo->delete();
        }
    	return redirect(action('Admin\ArtigosController@index'));
    }

}
