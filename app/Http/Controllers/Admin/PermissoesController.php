<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Permissao;
use App\ItemPermissao;

class PermissoesController extends Controller
{

    private $itens_permissoes = ['index', 'show', 'create', 'edit', 'destroy'];

    public function index(Request $request) {
        \Auth::user()->pode('Permissao', 'index');

    	$permissoes = Permissao::orderBy('id', 'desc')->paginate(10);
    	return View('Admin.permissoes.index', compact('permissoes'));
    }

    public function show($id) {
        \Auth::user()->pode('Permissao', 'show');

    	$permissao = Permissao::find($id);
    	return View('Admin.permissoes.show', compact('permissao'));
    }

    public function create() {
        \Auth::user()->pode('Permissao', 'create');

    	return View('Admin.permissoes.create');
    }

    public function store(Request $request) {
        \Auth::user()->pode('Permissao', 'create');

    	$this->validate($request, Permissao::rules());
    	$data = $request->all();
    	$permissao = Permissao::create($data);
        if ($permissao) {
            foreach ($this->itens_permissoes as $item) {
                ItemPermissao::create(['metodo' => $item, 'permissao_id' => $permissao->id]);
            }
            $itens_permissoes = ItemPermissao::where('permissao_id', '=', $permissao->id)
                                ->orderBy('permissao_id', 'asc')->paginate(10);
            return View('Admin.itens_permissoes.index', compact('itens_permissoes'));
        } else {
            return redirect()->back();
        }
    }

    public function edit($id) {
        \Auth::user()->pode('Permissao', 'edit');

        $permissao = Permissao::find($id);
        return View('Admin.permissoes.edit', compact("permissao"));
    }

    public function update(Request $request, $id) {
        \Auth::user()->pode('Permissao', 'edit');
        $permissao = Permissao::find($id);
        $this->validate($request, Permissao::rules());
        $data = $request->all();
        $permissao->fill($data)->save();
        return redirect(action('Admin\PermissoesController@show', $permissao->id));
    }

    public function destroy($id) {
        \Auth::user()->pode('Permissao', 'destroy');

        $permissao = Permissao::find($id);
        $permissao = $permissao->delete();
        return redirect(action('Admin\PermissoesController@show'));
    }

}
