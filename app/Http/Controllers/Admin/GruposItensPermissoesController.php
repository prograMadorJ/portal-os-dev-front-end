<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\GrupoItemPermissao;
use App\Grupo;
use App\ItemPermissao;
use App\Permissao;

class GruposItensPermissoesController extends Controller
{

    public function index() {
		\Auth::user()->pode('GrupoItemPermissao', 'index');

		$grupos_itens_permissoes = GrupoItemPermissao::orderBy('created_at', 'desc')->paginate(10);
		return View('Admin.grupos_itens_permissoes.index', compact('grupos_itens_permissoes'));
	}

	public function create() {
		\Auth::user()->pode('GrupoItemPermissao', 'create');

        $grupos = Grupo::where('status', '=', '1')->get();
        $permissoes = Permissao::where('status', '=', '1')->get();
		return View('Admin.grupos_itens_permissoes.create', compact('grupos', 'permissoes'));
	}

	public function store(Request $request) {
		\Auth::user()->pode('GrupoItemPermissao', 'create');

		$this->validate($request, GrupoItemPermissao::rules());
		$data = $request->all();
        foreach ($data['grupo_id'] as $key) {
            foreach ($data['item_permissao_id'] as $item_permissao_id) {
                $grupo_item_permissao = GrupoItemPermissao::create(['item_permissao_id' => $item_permissao_id, 'grupo_id' => $key]);
            }
        }
		return redirect(action('Admin\GruposItensPermissoesController@index'));
	}

	public function destroy($grupo_id, $item_permissao_id) {
		\Auth::user()->pode('GrupoItemPermissao', 'destroy');

        \DB::select('DELETE FROM grupos_itens_permissoes WHERE grupo_id = ? AND item_permissao_id = ?', [$grupo_id, $item_permissao_id]);
		return redirect(action("Admin\GruposItensPermissoesController@index"));
	}

    public function itens_permissoes($permissao_id) {
        $itens_permissoes = ItemPermissao::where('status', '=', '1')->where('permissao_id', '=', $permissao_id)->get();
        $str = '';
        foreach ($itens_permissoes as $item_permissao) {
            $str .= '<p><input name="item_permissao_id[]" checked="true" value="' . $item_permissao->id . '" type="checkbox" /> ' . $item_permissao->permissao->controlador . '/' . $item_permissao->metodo . '</p>';
        }
        return $str;
    }

}
