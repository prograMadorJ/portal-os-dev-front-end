<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Destaque;
use App\Artigo;

class DestaquesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        if (!\Auth::user()->pode('Destaque', 'index')) return redirect('/');

    	$destaques = Destaque::orderBy('id', 'desc')->paginate(10);
    	return View('Admin.destaques.index', compact('destaques'));
    }

    public function create() {
        if (!\Auth::user()->pode('Destaque', 'create')) return redirect('/');

    	$artigos = Artigo::where('status', '=', '1')
            ->limit(4)
            ->offset(0)
            ->orderBy('created_at', 'DESC')->get();
        $total_artigos = Artigo::all()->count();
        $destaque = null;
    	return View('Admin.destaques.create', compact('artigos', 'destaque', 'total_artigos'));
    }

    public function store(Request $request) {
        if (!\Auth::user()->pode('Destaque', 'create')) return redirect('/');

    	$this->validate($request, Destaque::rules());
    	$data = $request->all();
        // Data
        if (!isset($data['agendado']))
            $data['agendado'] = date('Y-m-d H:i:s');

    	$destaque = Destaque::create($data);
    	return redirect(action('Admin\DestaquesController@show', $destaque->id));
    }

    public function show($id) {
        if (!\Auth::user()->pode('Destaque', 'show')) return redirect('/');

    	$destaque = Destaque::find($id);
    	return View('Admin.destaques.show', compact('destaque'));
    }

    public function destroy($id) {
        if (!\Auth::user()->pode('Destaque', 'destroy')) return redirect('/');

    	Destaque::find($id)->delete();
    	return redirect(action('Admin\DestaquesController@index'));
    }

    public function edit($id) {
        if (!\Auth::user()->pode('Destaque', 'edit')) return redirect('/');

    	$artigos = Artigo::where('status', '=', '1')->orderBy('created_at', 'DESC')->get();
    	$destaque = Destaque::find($id);
    	return View('Admin.destaques.edit', compact('artigos', 'destaque'));
    }

    public function update(Request $request, $id) {
        if (!\Auth::user()->pode('Destaque', 'edit')) return redirect('/');
        $destaque = Destaque::find($id);

    	$this->validate($request, Destaque::rules('PATCH', $id));
    	$data = $request->all();
        // Data
        if (!isset($data['agendado']))
            $data['agendado'] = $destaque->agendado;

    	$destaque = $destaque->fill($data)->save();
    	return redirect(action('Admin\DestaquesController@show', $id));
    }

    public function more($num) {
        $artigos = Artigo::where('status', '=', '1')
            ->limit(4)
            ->offset($num)
            ->orderBy('created_at', 'DESC')->get();
        echo View('Admin.destaques._artigos', compact('artigos'));
    }

}
