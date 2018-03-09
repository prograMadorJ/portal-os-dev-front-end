<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cadastro;

class SacController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Portal_OS.pages.sac');
    }

    public function mailSender(Request $request) {
        // name
        // phone
        // email
        // specialty
        // cidade
        // comment

        $dados = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'specialty' => 'required',
            'city' => 'required',
            'comment' => 'required'
        ]);

        $cadastro = Cadastro::create($dados);

        if(isset($cadastro) && $cadastro) {
            Mail::send('mail.faleConosco', $dados, function ($message) {
                $message->from('contato@direitodeouvir.com.br', 'Direito de Ouvir');

                $message->sender($dados->email, $dados->name);

                $message->to('john@johndoe.com', 'John Doe');

                $message->cc('john@johndoe.com', 'John Doe');
                $message->bcc('john@johndoe.com', 'John Doe');

                $message->replyTo('john@johndoe.com', 'John Doe');

                $message->subject('Subject');

                $message->priority(3);

                $message->attach('pathToFile');
            });

        }
    }
}
