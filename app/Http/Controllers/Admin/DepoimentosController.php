<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Depoimento;
use App\Media;
use App\Cadastro;

class DepoimentosController extends Controller
{

    public function index() {
        if (!\Auth::user()->pode('Depoimento', 'index')) return redirect('/');

        $depoimentos = Depoimento::orderBy('id', 'desc')->paginate(10);
        return View('Admin.depoimentos.index', compact('depoimentos'));
    }

    public function show($id) {
        if (!\Auth::user()->pode('Depoimento', 'show')) return redirect('/');

        $depoimento = Depoimento::find($id);
        return View('Admin.depoimentos.show', compact('depoimento'));
    }

    public function create() {
        if (!\Auth::user()->pode('Depoimento', 'create')) return redirect('/');

        $media = Media::where('status', '=', '1')->get();
        return View('Admin.depoimentos.create', compact('media'));
    }

    public function store(Request $request) {
        if (!\Auth::user()->pode('Depoimento', 'create')) return redirect('/');

        $this->validate($request, Depoimento::rules());
        $data = $request->all();
        $depoimento = Depoimento::create($data);
        return redirect(action('Admin\DepoimentosController@show', $depoimento->id));
    }

    public function edit($id) {
        if (!\Auth::user()->pode('Depoimento', 'edit')) return redirect('/');

        $depoimento = Depoimento::find($id);
        $media = Media::where('status', '=', '1')->get();
        return View('Admin.depoimentos.edit', compact('depoimento', 'media'));
    }

    public function update(Request $request, $id) {
        if (!\Auth::user()->pode('Depoimento', 'edit')) return redirect('/');

        $this->validate($request, Depoimento::rules());
        $data = $request->all();
        $depoimento = Depoimento::find($id);
        $depoimento->fill($data)->save();
        return redirect(action('Admin\DepoimentosController@show', $depoimento->id));
    }

    public function destroy($id) {
        if (!\Auth::user()->pode('Depoimento', 'destroy')) return redirect('/');

        $depoimento = Depoimento::find($id);
        if ($depoimento) {
            $depoimento->delete();
        }
        return redirect(action('Admin\DepoimentosController@index'));
    }

    public function cadastros() {
        if (!\Auth::user()->pode('Cadastro', 'index')) return redirect('/');

        $cadastros = Cadastro::where('tipo_cadastro_id', '=', '3')
                            ->where('status', '=', '1')
                            ->paginate(10);
        return View('Admin.cadastros.index', compact('cadastros'));
    }

}
