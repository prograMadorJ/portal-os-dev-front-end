<?php

namespace App\Http\Controllers\Portal_OS\User;

use App\Http\Controllers\Controller;
use App\Depoimento;

class DepoimentosController extends Controller {

    public function index() {
        $depoimentos = Depoimento::select(
            'nome',
            'local',
            'conteudo'
        )->get();
        return view('Portal_OS.pages.stories',compact('depoimentos'));
    }

}
