<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Alternativa;
use App\Pergunta;

class AlternativasController extends Controller
{

	public function index() {
		\Auth::user()->pode('Alternativa', 'index');

		$alternativas = Alternativa::orderBy('id', 'desc')->paginate(10);
		return View('Admin.alternativas.index', compact('alternativas'));
	}

	public function show($id) {
		\Auth::user()->pode('Alternativa', 'show');

		$alternativa = Alternativa::find($id);
		return View('Admin.alternativas.show', compact('alternativa'));
	}

	public function create() {
		\Auth::user()->pode('Alternativa', 'create');

        $perguntas = Pergunta::where('status', '=', '1')->get()->pluck('titulo', 'id');
		return View('Admin.alternativas.create', compact('perguntas'));
	}

	public function store(Request $request) {
		\Auth::user()->pode('Alternativa', 'create');

		$this->validate($request, Alternativa::rules());
		$data = $request->all();
		$alternativa = Alternativa::create($data);
		return redirect('/site-admin/alternativas/'.$alternativa->id);
	}

	public function edit($id) {
		\Auth::user()->pode('Alternativa', 'edit');

		$alternativa = Alternativa::find($id);
        $perguntas = Pergunta::where('status', '=', '1')->get()->pluck('titulo', 'id');
		return View('Admin.alternativas.edit', compact('alternativa', 'perguntas'));
	}

	public function update(Request $request, $id) {
		\Auth::user()->pode('Alternativa', 'edit');

		$this->validate($request, Alternativa::rules());
		$data = $request->all();
		$alternativa = Alternativa::find($id);
		$alternativa->fill($data)->save();
		return redirect('/site-admin/alternativas/'.$alternativa->id);
	}

	public function destroy($id) {
		\Auth::user()->pode('Alternativa', 'destroy');

		$alternativa = Alternativa::find($id);
        if ($alternativa) {
            $alternativa->delete();
        }
		return redirect(action("Admin\AlternativasController@index"));
	}

}
