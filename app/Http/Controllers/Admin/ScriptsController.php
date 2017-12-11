<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Script;
use App\Local;

class ScriptsController extends Controller
{

  public function index() {
    if (!\Auth::user()->pode('Script', 'index')) return script('/');

    $scripts = Script::orderBy('id', 'desc')->paginate(10);
    return View('Admin.scripts.index', compact('scripts'));
  }

  public function show($id) {
    if (!\Auth::user()->pode('Script', 'show')) return script('/');

    $script = Script::find($id);
    return View('Admin.scripts.show', compact('script'));
  }

  public function create() {
    if (!\Auth::user()->pode('Script', 'create')) return script('/');

    $returns = [
        'places' => Local::all()
    ];
    return View('Admin.scripts.create', $returns);
  }

  public function store(Request $request) {
    if (!\Auth::user()->pode('Script', 'create')) return script('/');

    $this->validate($request, [
      'content' => 'required',
      'name' => 'required|max:100',
    ]);
    $data = $request->all();
    $script = Script::create($data);
    return redirect(action('Admin\ScriptsController@show', $script->id));
  }

  public function edit($id) {
    if (!\Auth::user()->pode('Script', 'edit')) return script('/');

    $returns = [
      'script' => Script::find($id),
      'places' => Local::all()
    ];
    return View('Admin.scripts.edit', $returns);
  }

  public function update(Request $request, $id) {
    if (!\Auth::user()->pode('Script', 'edit')) return script('/');

    $this->validate($request, [
      'code' => 'required',
      'name' => 'required|max:100',
    ]);
    $data = $request->all();
    $script = Script::find($id);
    $script->fill($data)->save();
    $script->places()->sync($data['places']);
    return redirect(action('Admin\ScriptsController@show', $script->id));
  }

  public function destroy($id) {
    if (!\Auth::user()->pode('Script', 'destroy')) return script('/');

    $script = Script::find($id);
    if ($script) {
      $script->delete();
    }
    return redirect(action('Admin\ScriptsController@index'));
  }

}
