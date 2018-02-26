<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Categoria;
use App\Seo;

class CategoriasController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        if (!\Auth::user()->pode('Categoria', 'index')) return redirect('/');

    	$categorias = Categoria::orderBy('id', 'desc')->paginate(10);
    	return View('Admin.categorias.index', compact('categorias'));
    }

    public function create() {
        if (!\Auth::user()->pode('Categoria', 'create')) return redirect('/');

    	$categorias = Categoria::all()->pluck('nome', 'id');
    	return View('Admin.categorias.create', compact('categorias'));
    }

    public function store(Request $request) {
        if (!\Auth::user()->pode('Categoria', 'create')) return redirect('/');

    	$this->validate($request, Categoria::rules());
    	$data = $request->all();

        $seo = Seo::create($data['seo']);
        if ($seo) {
            $data['seo_id'] = $seo->id;
        }
        $data['slug'] = str_slug($data['nome']);

    	$categoria = Categoria::create($data);
    	return redirect(action('Admin\CategoriasController@show', $categoria->id));
    }

    public function show($id) {
        if (!\Auth::user()->pode('Categoria', 'show')) return redirect('/');

    	$categoria = Categoria::find($id);
    	return View('Admin.categorias.show', compact('categoria'));
    }

    public function destroy($id) {
        if (!\Auth::user()->pode('Categoria', 'destroy')) return redirect('/');

    	Categoria::find($id)->delete();
    	return redirect(action('Admin\CategoriasController@index'));
    }

    public function edit($id) {
        if (!\Auth::user()->pode('Categoria', 'edit')) return redirect('/');

    	$categorias = Categoria::orderBy('nome', 'asc')->get()->pluck('nome', 'id');
    	$categoria = Categoria::find($id);
    	return View('Admin.categorias.edit', compact('categorias', 'categoria'));
    }

    public function update(Request $request, $id) {
        if (!\Auth::user()->pode('Categoria', 'edit')) return redirect('/');

    	$this->validate($request, Categoria::rules('PATCH', $id));
    	$data = $request->all();

        $seo = Categoria::find($id)->seo;
        if ($seo)
            $seo->fill($data['seo'])->save();
        else {
            $seo = Seo::create($data['seo']);
            $data['seo_id'] = $seo->id;
        }

    	$categoria = Categoria::find($id)->fill($data)->save();
    	return redirect(action('Admin\CategoriasController@show', $id));
    }
}
