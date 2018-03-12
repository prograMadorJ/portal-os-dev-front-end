<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Cadastro;
use App\GDO\Estado;
use App\GDO\Cidade;


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
    public function index(Request $request)
    {
        $estados = Estado::with('cidades')->get();

        return view('Portal_OS.pages.sac',
            compact(
                'estados'
            )
        );
    }

    public function getCity(Request $request) {
        $estadoId = $request->input('estadoId');

        $cidades = Cidade::where('id_estado', '=', $estadoId)->get();

        return $cidades;
    }

    public function mailSender(Request $request) {
        $messages = [
            'nome.required' => 'Campo obrigatório!',
            'telefone.required' => 'Campo obrigatório!',
            'email.required' => 'Campo obrigatório!',
            'estado.required' => 'campo Obrigatório!',
            'cidade.required' => 'Campo obrigatório!'
        ];

        Validator::make($request->all(), [
            'nome' =>  'required|max:50',
            'telefone' => 'required|max:15',
            'email' => 'required|max:100|email',
            'cidade' => 'required|max:50'
        ], $messages)->validate();

        $contato = Cadastro::create([
            'nome' => $request->get('nome'),
            'email' => $request->get('email'),
            'telefone' => $request->get('telefone'),
            'especialidade' => $request->get('especialidade'),
            'cidade' => $request->get('cidade'),
            'conteudo' => $request->get('comentario')
        ]);

        if($contato->id) {
            Mail::send('mail.faleConosco', [
                'nome' => $contato->nome,
                'email' => $contato->email,
                'telefone' => $contato->telefone,
                'especialidade' => $contato->especialidade,
                'cidade' => $contato->cidade,
                'conteudo' => $contato->conteudo
            ],

            function ($message) use ($contato) {
                $message->from($contato->email, $contato->nome);
                $message->to('contato@direitodeouvir.com.br');
            });

            return redirect('sac')->with('success', 'Mensagem Enviada com Sucesso!');
        }
    }
}
