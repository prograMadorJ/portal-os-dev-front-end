<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Questao;

class QuestoesController extends Controller
{

    public function index() {
		\Auth::user()->pode('Questao', 'index');

		$questoes = Questao::orderBy('id', 'desc')->paginate(10);
		return View('Admin.questoes.index', compact('questoes'));
	}

	public function show($id) {
		\Auth::user()->pode('Questao', 'show');

		$questao = Questao::find($id);
		return View('Admin.questoes.show', compact('questao'));
	}

	public function create() {
		\Auth::user()->pode('Questao', 'create');

		return View('Admin.questoes.create');
	}

	public function store(Request $request) {
		\Auth::user()->pode('Questao', 'create');

		$this->validate($request, Questao::rules());
		$data = $request->all();
		$questao = Questao::create($data);
		return redirect('/site-admin/questoes/'.$questao->id);
	}

	public function edit($id) {
		\Auth::user()->pode('Questao', 'edit');

		$questao = Questao::find($id);
		return View('Admin.questoes.edit', compact('questao'));
	}

	public function update(Request $request, $id) {
		\Auth::user()->pode('Questao', 'edit');

		$this->validate($request, Questao::rules());
		$data = $request->all();
		$questao = Questao::find($id);
		$questao->fill($data)->save();
		return redirect('/site-admin/questoes/'.$questao->id);
	}

	public function destroy($id) {
		\Auth::user()->pode('Questao', 'destroy');

		$questao = Questao::find($id);
        if ($questao)
		      $questao->delete();
		return redirect(action("Admin\QuestoesController@index"));
	}

}
