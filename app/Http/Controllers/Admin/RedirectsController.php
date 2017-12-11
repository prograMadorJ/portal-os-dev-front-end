<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Redirect;

class RedirectsController extends Controller
{

    public function index() {
        if (!\Auth::user()->pode('Redirect', 'index')) return redirect('/');

        $redirects = Redirect::orderBy('id', 'desc')->paginate(10);
        return View('Admin.redirects.index', compact('redirects'));
    }

    public function show($id) {
        if (!\Auth::user()->pode('Redirect', 'show')) return redirect('/');

        $redirect = Redirect::find($id);
        return View('Admin.redirects.show', compact('redirect'));
    }

    public function create() {
        if (!\Auth::user()->pode('Redirect', 'create')) return redirect('/');

        return View('Admin.redirects.create');
    }

    public function store(Request $request) {
        if (!\Auth::user()->pode('Redirect', 'create')) return redirect('/');

        $this->validate($request, Redirect::rules());
        $data = $request->all();
        $redirect = Redirect::create($data);
        return redirect(action('Admin\RedirectsController@show', $redirect->id));
    }

    public function edit($id) {
        if (!\Auth::user()->pode('Redirect', 'edit')) return redirect('/');

        $redirect = Redirect::find($id);
        return View('Admin.redirects.edit', compact('redirect'));
    }

    public function update(Request $request, $id) {
        if (!\Auth::user()->pode('Redirect', 'edit')) return redirect('/');

        $this->validate($request, Redirect::rules());
        $data = $request->all();
        $redirect = Redirect::find($id);
        $redirect->fill($data)->save();
        return redirect(action('Admin\RedirectsController@show', $redirect->id));
    }

    public function destroy($id) {
        if (!\Auth::user()->pode('Redirect', 'destroy')) return redirect('/');

        $redirect = Redirect::find($id);
        if ($redirect) {
            $redirect->delete();
        }
        return redirect(action('Admin\RedirectsController@index'));
    }

}
