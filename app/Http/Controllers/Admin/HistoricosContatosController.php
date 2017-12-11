<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\HistoricosContatosMail;

use App\HistoricosContato;

class HistoricosContatosController extends Controller
{

    public function store(Request $request) {
        \Auth::user()->pode('HistoricosContato', 'create');

        $this->validate($request, HistoricosContato::rules());
        $data = $request->all();
        if (isset($data['is_pacients'])) {
            $data['from_id'] = $data['cadastro_id'];
            $data['from_model'] = "Cadastro";
        } else {
            $data['from_id'] = $data['user_id'];
            $data['from_model'] = "User";
        }
        $historicos_contato = HistoricosContato::create($data);
        if ($historicos_contato->from_model == 'User') {
            if (app()->environment() == 'production') {
    			Mail::to($historicos_contato->cadastro->email)->send(new HistoricosContatosMail($historicos_contato, 'Direito de Ouvir enviou uma mensagem sobre seu Depoimento'));
    		} else {
    			Mail::to('jean.mfdias@direitodeouvir.com.br')->send(new HistoricosContatosMail($historicos_contato, 'Direito de Ouvir enviou uma mensagem sobre seu Depoimento'));
    		}
        }
        echo View('Admin.historicos_contatos._contato', compact('historicos_contato'));
    }

}
