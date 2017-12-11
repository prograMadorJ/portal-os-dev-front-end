<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use App\Pergunta;
use App\Teste;

class PerguntasController extends Controller
{

	public function index() {
		\Auth::user()->pode('Pergunta', 'index');

		$perguntas = Pergunta::orderBy('id', 'desc')->paginate(10);
		return View('Admin.perguntas.index', compact('perguntas'));
	}

	public function show($id) {
		\Auth::user()->pode('Pergunta', 'show');

		$pergunta = Pergunta::find($id);
		$pergunta->recuperar_url();
		return View('Admin.perguntas.show', compact('pergunta'));
	}

	public function create() {
		\Auth::user()->pode('Pergunta', 'create');
        $testes = Teste::where('status', '=', '1')->get()->pluck('nome', 'id');
		return View('Admin.perguntas.create', compact('testes'));
	}

	public function store(Request $request) {
		\Auth::user()->pode('Pergunta', 'create');
		$this->validate($request, Pergunta::rules());
		$data = $request->all();
		$file = $request->file('imagem');
		if ($file) {
        	$data['imagem'] = $file->getClientOriginalName();
			Storage::disk('s3')->put('/uploads/perguntas/'.$pergunta->id.'/'.$pergunta->imagem, file_get_contents($file), ['visibility' => 'public', 'Expires' => '1 year']);
		}
		$pergunta = Pergunta::create($data);
		return redirect('/site-admin/perguntas/'.$pergunta->id);
	}

	public function edit($id) {
		\Auth::user()->pode('Pergunta', 'edit');

		$pergunta = Pergunta::find($id);
        $testes = Teste::where('status', '=', '1')->get()->pluck('nome', 'id');
		$pergunta->recuperar_url();
		return View('Admin.perguntas.edit', compact('pergunta', 'testes'));
	}

	public function update(Request $request, $id) {
		\Auth::user()->pode('Pergunta', 'edit');
		$this->validate($request, Pergunta::rules());
		$data = $request->all();

		$pergunta = Pergunta::find($id);

		$file = $request->file('imagem');
        if ($file) {
          $data['imagem'] = $file->getClientOriginalName();
          Storage::disk('s3')->put('/uploads/perguntas/'.$id.'/'.$data['imagem'], file_get_contents($file), ['visibility' => 'public', 'Expires' => '1 year']);
		  Storage::disk('s3')->delete('/uploads/perguntas/'.$id.'/'.$pergunta->imagem);
        } else {
          $data['imagem'] = $pergunta->imagem;
        }

		$pergunta->fill($data)->save();
		return redirect('/site-admin/perguntas/'.$pergunta->id);
	}

	public function destroy($id) {
		\Auth::user()->pode('Pergunta', 'destroy');
		$pergunta = Pergunta::find($id);
        if ($pergunta) {
            $pergunta->delete();
        }
		return redirect(action("Admin\PerguntasController@index"));
	}

}
