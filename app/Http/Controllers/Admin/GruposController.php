<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Grupo;

class GruposController extends Controller
{

	public function index() {
		\Auth::user()->pode('Grupo', 'index');

		$grupos = Grupo::orderBy('id', 'desc')->paginate(10);
		return View('Admin.grupos.index', compact('grupos'));
	}

	public function show($id) {
		\Auth::user()->pode('Grupo', 'show');

		$grupo = Grupo::find($id);
		return View('Admin.grupos.show', compact('grupo'));
	}

	public function create() {
		\Auth::user()->pode('Grupo', 'create');
		return View('Admin.grupos.create');
	}

	public function store(Request $request) {
		\Auth::user()->pode('Grupo', 'create');
		$this->validate($request, Grupo::rules());
		$data = $request->all();
		$grupo = Grupo::create($data);
		return redirect('/site-admin/grupos/'.$grupo->id);
	}

	public function edit($id) {
		\Auth::user()->pode('Grupo', 'edit');
		$grupo = Grupo::find($id);
		return View('Admin.grupos.edit', compact('grupo'));
	}

	public function update(Request $request, $id) {
		\Auth::user()->pode('Grupo', 'edit');
		$this->validate($request, Grupo::rules());
		$data = $request->all();
		$grupo = Grupo::find($id);
		$grupo->fill($data)->save();
		return redirect('/site-admin/grupos/'.$grupo->id);
	}

	public function destroy($id) {
		\Auth::user()->pode('Grupo', 'destroy');
		$grupo = Grupo::find($id);
		$grupo->delete();
		return redirect(action("Admin\GruposController@index"));
	}

}
