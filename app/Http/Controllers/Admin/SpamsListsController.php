<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SpamsList;

class SpamsListsController extends Controller
{

	public function index() {
		\Auth::user()->pode('SpamsList', 'index');

		$spams_lists = SpamsList::orderBy('id', 'desc')->paginate(10);
		return View('Admin.spams_lists.index', compact('spams_lists'));
	}

	public function show($id) {
		\Auth::user()->pode('SpamsList', 'show');

		$spams_list = SpamsList::find($id);
		return View('Admin.spams_lists.show', compact('spams_list'));
	}

	public function create() {
		\Auth::user()->pode('SpamsList', 'create');

		return View('Admin.spams_lists.create');
	}

	public function store(Request $request) {
		\Auth::user()->pode('SpamsList', 'create');

		$this->validate($request, SpamsList::rules());
		$data = $request->all();
		$spams_list = SpamsList::create($data);
		return redirect('/site-admin/spams_lists/'.$spams_list->id);
	}

	public function edit($id) {
		\Auth::user()->pode('SpamsList', 'edit');

		$spams_list = SpamsList::find($id);
		return View('Admin.spams_lists.edit', compact('spams_list'));
	}

    public function update(Request $request, $id) {
		\Auth::user()->pode('SpamsList', 'edit');

        $this->validate($request, SpamsList::rules('PATCH', $id));
		$data = $request->all();
		$spams_list = SpamsList::find($id);
		$spams_list->fill($data)->save();
		return redirect('/site-admin/spams_lists/'.$spams_list->id);
	}

	public function destroy($id) {
		\Auth::user()->pode('SpamsList', 'destroy');

        $spams_list = SpamsList::find($id);
        if ($spams_list) {
            $spams_list->delete();
        }
		return redirect(action("Admin\SpamsListsController@index"));
	}

}
