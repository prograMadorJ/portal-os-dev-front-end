<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Resposta;
use App\Pergunta;

class RespostasController extends Controller
{

	public function index() {
		\Auth::user()->pode('Resposta', 'index');

		$respostas = Resposta::orderBy('id', 'desc')->paginate(10);
		return View('Admin.respostas.index', compact('respostas'));
	}

	public function show($id) {
		\Auth::user()->pode('Resposta', 'show');

		$resposta = Resposta::find($id);
		return View('Admin.respostas.show', compact('resposta'));
	}

	public function destroy($id) {
		\Auth::user()->pode('Resposta', 'destroy');

		$resposta = Resposta::find($id);
        if ($resposta) {
            $resposta->delete();
        }
		return redirect(action("Admin\RespostasController@index"));
	}

}
