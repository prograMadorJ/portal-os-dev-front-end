<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Media;
use App\TipoMedia;
use App\MediaDerivative;

class MediaController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        if (!\Auth::user()->pode('Media', 'index')) return redirect('/');

    	$media = Media::orderBy('id', 'DESC')
            ->has('media_parent', '=', 'null')->paginate(10);
    	return View('Admin.media.index', compact('media'));
    }

    public function create() {
        if (!\Auth::user()->pode('Media', 'create')) return redirect('/');

    	$tipo_media = TipoMedia::orderBy('descricao', 'asc')->get()->pluck('descricao', 'id');
    	return View("Admin.media.create", compact('tipo_media'));
    }

    public function store(Request $request) {
        if (!\Auth::user()->pode('Media', 'create')) return redirect('/');

        $data = $request->all();
        if ($data['tipo_media_id'] == 1) {
            $this->validate($request, [
                'tipo_media_id' => 'required',
                'arquivo' => 'max:100000|image'
            ]);
        } else {
            $this->validate($request, Media::rules());
        }
        // Imagem Main
        $file = $request->file('arquivo');
        $data['arquivo'] = $file->getClientOriginalName();
        $data['tamanho_arquivo'] = $file->getClientSize();
    	$media = Media::create($data);
        Storage::disk('s3')->put('/uploads/media/'.$media->id.'/'.$media->arquivo, file_get_contents($file), ['visibility' => 'public', 'Expires' => '1 year']);

        // Imagens derivadas
        $this->save_media_derivatives($request, $media);

    	return redirect(action('Admin\MediaController@show', $media->id));
    }

    public function show($id) {
        if (!\Auth::user()->pode('Media', 'show')) return redirect('/');

    	$media = Media::find($id);
    	return View('Admin.media.show', compact('media'));
    }

    public function edit($id) {
        if (!\Auth::user()->pode('Media', 'edit')) return redirect('/');

    	$tipo_media = TipoMedia::orderBy('descricao', 'asc')->get()->pluck('descricao', 'id');
        $media = Media::find($id);
    	return View('Admin.media.edit', compact('tipo_media', 'media'));
    }

    public function update(Request $request, $id) {
        if (!\Auth::user()->pode('Media', 'edit')) return redirect('/');

    	$this->validate($request, Media::rules('PATCH', $id));
    	$data = $request->all();
        $media = Media::find($id);

        // Imagem
        $file = $request->file('arquivo');
        if ($file) {
            $data['arquivo'] = $file->getClientOriginalName();
            Storage::disk('s3')->put('/uploads/media/'.$id.'/'.$data['arquivo'], file_get_contents($file), ['visibility' => 'public', 'Expires' => '1 year']);
            Storage::disk('s3')->delete('/uploads/media/'.$id.'/'.$media->arquivo);
        } else {
            $data['arquivo'] = $media->arquivo;
        }
    	$media->fill($data)->save();
        // Imagens derivadas
        $this->save_media_derivatives($request, $media);

    	return redirect(action('Admin\MediaController@show', $id));
    }

    public function destroy($id) {
        if (!\Auth::user()->pode('Media', 'destroy')) return redirect('/');

    	$media = Media::find($id);
        if ($media) {
            if (count($media->media_derivatives) > 0) {
                foreach ($media->media_derivatives as $md) {
                    $md_id = $md->media_id;
                    $md->delete();
                    $md = Media::find($md_id);
                    if ($md) {
                        $md->delete();
                    }
                }
            } else {
                $md = MediaDerivative::where('media_id', $media->id)->first();
                if ($md) {
                    $md->delete();
                }
            }
            $media->delete();
        }
    	return redirect(action('Admin\MediaController@index'));
    }

    public function media_derivatives() {
        $md = null;
        echo View('Admin.media_derivatives._form', compact('md'))->render();
    }

    public function media_derivatives_destroy($id) {
        $media_derivatives = MediaDerivative::find($id);
        if ($media_derivatives) {
            $media = Media::find($media_derivatives->media->id);
            if ($media) {
                $media->delete();
            }
            $media_derivatives->delete();
            return 'true';
        }
        return 'false';
    }

    /**
     *
     */
    public function filter() {
        if ($_GET['search_media'] != '') {
            $media = Media::whereNotIn('id', MediaDerivative::select('media_id')->get())
                ->where('tipo_media_id', 1)
                ->where(function ($q) {
                    $q->where('id', $_GET['search_media'])
                    ->orWhere('titulo', 'LIKE',  "%".$_GET['search_media']."%");
                })
                ->orderBy('id', 'desc')->get();
        } else {
            $media = Media::whereNotIn('id', MediaDerivative::select('media_id')->get())
                ->where('tipo_media_id', 1)
                ->orderBy('id', 'desc')->get();
        }
        $field_name = isset($_GET['field_name']) ? $_GET['field_name'] : 'media_id';
        echo view('Admin.media._filter_each', compact('media', 'field_name'))->render();
    }

    /**
     * @return string
     */
    private function save_media_derivatives(Request $request, $media) {
        $data = $request->all();
        $msg = "Salvo com sucesso";
        if (isset($request->media_derivatives)) {
            $i = 0;
            $e = 0;
            foreach ($request->media_derivatives as $md) {
                if ($md->getClientSize() > 100000) {
                    $e++;
                    $msg = $e." Imagens derivadas maiores que 100kb";
                } else {
                    $media_d = Media::create(array(
                        'arquivo' => $md->getClientOriginalName(),
                        'tipo_media_id' => $media->tipo_media_id,
                        'tamanho_arquivo' => $md->getClientSize(),
                        'titulo' => $media->titulo,
                        'descricao' => $media->descricao,
                        'status' => $media->status,
                    ));
                    Storage::disk('s3')->put('/uploads/media/'.$media_d->id.'/'.$media_d->arquivo, file_get_contents($md), ['visibility' => 'public', 'Expires' => '1 year']);
                    $media_derivatives = MediaDerivative::create(array(
                        'media_id' => $media_d->id,
                        'media_parent_id' => $media->id,
                        'screen' => $data['screen'][$i],
                    ));
                }
                $i++;
            }
        }
        return $msg;
    }

}
