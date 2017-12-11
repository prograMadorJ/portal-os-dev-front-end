<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\TipoCadastro;

class TipoCadastrosController extends Controller
{
    public function index() {
        if (!\Auth::user()->pode('TipoCadastro', 'index')) return redirect('/');

        $tipo_cadastros = TipoCadastro::orderBy('id', 'desc')->paginate(10);
        return View('Admin.tipo_cadastros.index', compact('tipo_cadastros'));
    }

    public function show($id) {
        if (!\Auth::user()->pode('TipoCadastro', 'show')) return redirect('/');

        $tipo_cadastro = TipoCadastro::find($id);
        return View('Admin.tipo_cadastros.show', compact('tipo_cadastro'));
    }

    public function create() {
        if (!\Auth::user()->pode('TipoCadastro', 'create')) return redirect('/');

        return View('Admin.tipo_cadastros.create');
    }

    public function store(Request $request) {
        if (!\Auth::user()->pode('TipoCadastro', 'create')) return redirect('/');

        $this->validate($request, TipoCadastro::rules());
        $data = $request->all();
        $tipo_cadastro = TipoCadastro::create($data);
        return redirect(action('Admin\TipoCadastrosController@show', $tipo_cadastro->id));
    }

    public function edit($id) {
        if (!\Auth::user()->pode('TipoCadastro', 'edit')) return redirect('/');

        $tipo_cadastro = TipoCadastro::find($id);
        return View('Admin.tipo_cadastros.edit', compact('tipo_cadastro'));
    }

    public function update(Request $request, $id) {
        if (!\Auth::user()->pode('TipoCadastro', 'edit')) return redirect('/');

        $this->validate($request, TipoCadastro::rules());
        $data = $request->all();
        $tipo_cadastro = TipoCadastro::find($id);
        $tipo_cadastro->fill($data)->save();
        return redirect(action('Admin\TipoCadastrosController@show', $tipo_cadastro->id));
    }

    public function destroy($id) {
        if (!\Auth::user()->pode('TipoCadastro', 'destroy')) return redirect('/');

        $tipo_cadastro = TipoCadastro::find($id);
        if ($tipo_cadastro) {
            $tipo_cadastro->delete();
        }
        return redirect(action('Admin\TipoCadastrosController@index'));
    }
}
