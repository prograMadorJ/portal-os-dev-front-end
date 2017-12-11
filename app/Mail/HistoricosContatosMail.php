<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\HistoricosContato;

class HistoricosContatosMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $historicos_contato, $assunto;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(HistoricosContato $data, $assunto)
    {
        $this->historicos_contato = $data;
        $this->assunto = $assunto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contato@direitodeouvir.com.br')
            ->subject($this->assunto)
            ->view('mail.historicos_contato')
            ->with(['historicos_contato' => $this->historicos_contato]);
    }
}
