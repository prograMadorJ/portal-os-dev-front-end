<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Cadastro;

class Contatos extends Mailable
{
    use Queueable, SerializesModels;

    protected $contato;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Cadastro $contato)
    {
        $this->contato = $contato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contato@direitodeouvir.com.br')
                    ->view('mail.contato')
                    ->with(['contato' => $this->contato]);
    }
}
