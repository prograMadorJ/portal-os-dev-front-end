<?php

namespace App\Http\Controllers\Portal_OS\User;

use App\Http\Controllers\Controller;
use App\Depoimento;

class DepoimentoController extends Controller {

    public static function getDepoimentos() {
        $depoimentos = Depoimento::select(
            'nome',
            'local',
            'conteudo'
        )->get();
        return compact('depoimentos');
    }

}