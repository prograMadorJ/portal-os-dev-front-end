<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Cadastro;
use App\TipoCadastro;

class CadastrosController extends Controller
{

  public function index() {
    if (!\Auth::user()->pode('Cadastro', 'index')) return redirect('/');

    $cadastros = Cadastro::orderBy('id', 'desc')->paginate(10);
    return View('Admin.cadastros.index', compact('cadastros'));
  }

  public function show($id) {
    if (!\Auth::user()->pode('Cadastro', 'show')) return redirect('/');

    $cadastro = Cadastro::find($id);
    return View('Admin.cadastros.show', compact('cadastro'));
  }

  public function create() {
    if (!\Auth::user()->pode('Cadastro', 'create')) return redirect('/');

    $tipo_cadastros = TipoCadastro::where('status', '=', '1')->get()->pluck('descricao', 'id');
    return View('Admin.cadastros.create', compact('tipo_cadastros'));
  }

  public function store(Request $request) {
    if (!\Auth::user()->pode('Cadastro', 'create')) return redirect('/');

    $this->validate($request, Cadastro::rules());
    $data = $request->all();
    $data['cliente_ip'] = $_SERVER['REMOTE_ADDR'];
		$data['http_user_agent'] = $_SERVER['HTTP_USER_AGENT'];

    $cadastro = Cadastro::create($data);
    return redirect(action('Admin\CadastrosController@show', $cadastro->id));
  }

  public function edit($id) {
    if (!\Auth::user()->pode('Cadastro', 'edit')) return redirect('/');

    $cadastro = Cadastro::find($id);
    $tipo_cadastros = TipoCadastro::where('status', '=', '1')->get()->pluck('descricao', 'id');
    return View('Admin.cadastros.edit', compact('cadastro', 'tipo_cadastros'));
  }

  public function update(Request $request, $id) {
    if (!\Auth::user()->pode('Cadastro', 'edit')) return redirect('/');

    $this->validate($request, Cadastro::rules());
    $data = $request->all();
    $data['cliente_ip'] = $_SERVER['REMOTE_ADDR'];
		$data['http_user_agent'] = $_SERVER['HTTP_USER_AGENT'];

    $cadastro = Cadastro::find($id);

    $cadastro->fill($data)->save();
    return redirect(action('Admin\CadastrosController@show', $cadastro->id));
  }

  public function destroy($id) {
    if (!\Auth::user()->pode('Cadastro', 'destroy')) return redirect('/');

    $cadastro = Cadastro::find($id);
    if ($cadastro) {
      $cadastro->delete();
    }
    return redirect(action('Admin\CadastrosController@index'));
  }

}
