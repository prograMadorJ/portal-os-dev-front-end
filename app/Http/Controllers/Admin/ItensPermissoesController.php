<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ItemPermissao;
use App\Permissao;

class ItensPermissoesController extends Controller
{
    public function index(Request $request) {
        \Auth::user()->pode('ItemPermissao', 'index');

    	$itens_permissoes = ItemPermissao::orderBy('permissao_id', 'asc')->paginate(10);
    	return View('Admin.itens_permissoes.index', compact('itens_permissoes'));
    }

    public function show($id) {
        \Auth::user()->pode('ItemPermissao', 'show');

    	$itemPermissao = ItemPermissao::find($id);
    	return View('Admin.itens_permissoes.show', compact('itemPermissao'));
    }

    public function create() {
        \Auth::user()->pode('ItemPermissao', 'create');

        $permissoes = Permissao::where('status', '=', '1')->get()->pluck('controlador', 'id');
        return View('Admin.itens_permissoes.create', compact('permissoes'));
    }

    public function store(Request $request) {
        \Auth::user()->pode('ItemPermissao', 'create');

    	$this->validate($request, ItemPermissao::rules());
    	$data = $request->all();
    	$itemPermissao = ItemPermissao::create($data);
    	return redirect(action('Admin\ItensPermissoesController@show', $itemPermissao->id));
    }

    public function edit($id) {
        \Auth::user()->pode('ItemPermissao', 'edit');

        $permissoes = Permissao::where('status', '=', '1')->get()->pluck('controlador', 'id');
        $itemPermissao = ItemPermissao::find($id);
        return View('Admin.itens_permissoes.edit', compact("itemPermissao", 'permissoes'));
    }

    public function update(Request $request, $id) {
        \Auth::user()->pode('ItemPermissao', 'edit');
        $itemPermissao = ItemPermissao::find($id);
        $this->validate($request, ItemPermissao::rules());
        $data = $request->all();
        $itemPermissao->fill($data)->save();
        return redirect(action('Admin\ItensPermissoesController@show', $id));
    }

    public function destroy($id) {
        \Auth::user()->pode('ItemPermissao', 'destroy');

        $itemPermissao = ItemPermissao::find($id);
        $itemPermissao = $itemPermissao->delete();
        return redirect(action('Admin\ItensPermissoesController@index'));
    }
}
