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
        // $estadoTeste = Estado::where('id_estado', 26)->with('cidades')->get();

        // $cidadesTeste = Cidade::where('id_estado', 26)->with('estado')->take(3)->get();

        // dd(
        //     "São Paulo", $estadoTeste,
        //     "cidades SP", $cidadesTeste,
        //     "acessa estado", $cidadesTeste[0]->estado,
        //     "acessa cid", $estadoTeste[0]->cidades[1]->descricao
        // );

        $estados = Estado::with('cidades')->get();

        $estadoId = $request->input('estadoId');
        $cidade = Cidade::where('id_estado', '=', $estadoId);

        return view('Portal_OS.pages.sac',
            compact(
                'estados',
                'cidades'
            )
        );
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
