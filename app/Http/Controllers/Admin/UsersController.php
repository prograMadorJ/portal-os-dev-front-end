<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Grupo;

class UsersController extends Controller
{

	public function __construct() {
		//
	}

	public function index() {
		if (!\Auth::user()->pode('User', 'index')) return redirect('/');

		$usuarios = User::orderBy('id', 'desc')->paginate(10);
		return View("Admin.usuarios.index", compact('usuarios'));
	}

	public function create() {
		if (!\Auth::user()->pode('User', 'create')) return redirect('/');

		$grupos = Grupo::where('status', '=', '1')->pluck('nome', 'id');
		return View("Admin.usuarios.create", compact('grupos'));
	}

	public function store(Request $request) {
		if (!\Auth::user()->pode('User', 'create')) return redirect('/');

		$this->validate($request, User::rules('POST', null));

		$data = $request->all();
		$data['password'] = bcrypt($data['password']);

		$usuario = User::create($data);
		return redirect('/site-admin/usuarios/' .$usuario->id);
	}

	public function show($id) {
		if (!\Auth::user()->pode('User', 'show')) {
			if (\Auth::user()->id != $id) {
				return redirect('/');
			}
		}

		$usuario = User::find($id);
		return View('Admin.usuarios.show', compact("usuario"));
	}

	public function destroy($id) {
		if (!\Auth::user()->pode('User', 'destroy')) return redirect('/');

		$usuario = User::find($id);
		if ($usuario) {
			$usuario->delete();
		}
		return redirect('/site-admin/usuarios');
	}

	public function edit($id) {
		if (!\Auth::user()->pode('User', 'edit')) return redirect('/');

		$usuario = User::find($id);
		$grupos = Grupo::where('status', '=', '1')->pluck('nome', 'id');
		return View('Admin.usuarios.edit', compact('usuario', 'grupos'));
	}

	public function update(Request $request, $id) {
		if (!\Auth::user()->pode('User', 'edit')) return redirect('/');

		$usuario = User::find($id);
		$this->validate($request, User::rules('PATCH', $id));

		$data = $request->all();
		$data['password'] = isset($data['password']) ? bcrypt($data['password']) : $usuario->password;
		$usuario->fill($data)->save();
		return redirect('/site-admin/usuarios/' .$usuario->id);
	}

}
