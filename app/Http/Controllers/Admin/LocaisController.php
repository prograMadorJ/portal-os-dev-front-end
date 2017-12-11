<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Local;

class LocaisController extends Controller
{

	public function index() {
		\Auth::user()->pode('Local', 'index');

		$locais = Local::orderBy('id', 'desc')->paginate(10);
		return View('Admin.locais.index', compact('locais'));
	}

	public function show($id) {
		\Auth::user()->pode('Local', 'show');

		$local = Local::find($id);
		return View('Admin.locais.show', compact('local'));
	}

	public function create() {
		\Auth::user()->pode('Local', 'create');

		return View('Admin.locais.create');
	}

	public function store(Request $request) {
		\Auth::user()->pode('Local', 'create');

		$this->validate($request, Local::rules());
		$data = $request->all();
		$local = Local::create($data);
		return redirect('/site-admin/locais/'.$local->id);
	}

	public function edit($id) {
		\Auth::user()->pode('Local', 'edit');

		$local = Local::find($id);
		return View('Admin.locais.edit', compact('local'));
	}

    public function update(Request $request, $id) {
		\Auth::user()->pode('Local', 'edit');

        $this->validate($request, Local::rules('PATCH', $id));
		$data = $request->all();
		$local = Local::find($id);
		$local->fill($data)->save();
		return redirect('/site-admin/locais/'.$local->id);
	}

	public function destroy($id) {
		\Auth::user()->pode('Local', 'destroy');

        $local = Local::find($id);
        if ($local) {
            $local->delete();
        }
		return redirect(action("Admin\LocaisController@index"));
	}

}
