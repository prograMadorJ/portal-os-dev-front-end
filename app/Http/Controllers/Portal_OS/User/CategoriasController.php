<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Categoria;

class CategoriasController extends Controller {

    public function index() {
        $categorias = Categoria::select(
            'nome',
            'descricao',
            'slug'
        )->get();
        return view('Portal_OS.pages.stories',compact('categorias'));
    }

}