<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\TipoMedia;

class TipoMediaController extends Controller
{
    public function index() {
        if (!\Auth::user()->pode('TipoMedia', 'index')) return redirect('/');

        $tipo_media = TipoMedia::orderBy('id', 'desc')->paginate(10);
        return View('Admin.tipo_media.index', compact('tipo_media'));
    }

    public function show($id) {
        if (!\Auth::user()->pode('TipoMedia', 'show')) return redirect('/');

        $tipo_media = TipoMedia::find($id);
        return View('Admin.tipo_media.show', compact('tipo_media'));
    }

    public function create() {
        if (!\Auth::user()->pode('TipoMedia', 'create')) return redirect('/');

        return View('Admin.tipo_media.create');
    }

    public function store(Request $request) {
        if (!\Auth::user()->pode('TipoMedia', 'create')) return redirect('/');

        $this->validate($request, TipoMedia::rules());
        $data = $request->all();
        $tipo_media = TipoMedia::create($data);
        return redirect(action('Admin\TipoMediaController@show', $tipo_media->id));
    }

    public function edit($id) {
        if (!\Auth::user()->pode('TipoMedia', 'edit')) return redirect('/');

        $tipo_media = TipoMedia::find($id);
        return View('Admin.tipo_media.edit', compact('tipo_media'));
    }

    public function update(Request $request, $id) {
        if (!\Auth::user()->pode('TipoMedia', 'edit')) return redirect('/');

        $this->validate($request, TipoMedia::rules());
        $data = $request->all();
        $tipo_media = TipoMedia::find($id);
        $tipo_media->fill($data)->save();
        return redirect(action('Admin\TipoMediaController@show', $tipo_media->id));
    }

    public function destroy($id) {
        if (!\Auth::user()->pode('TipoMedia', 'destroy')) return redirect('/');

        $tipo_media = TipoMedia::find($id);
        if ($tipo_media) {
            $tipo_media->delete();
        }
        return redirect(action('Admin\TipoMediaController@index'));
    }
}
