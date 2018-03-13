<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FaleConosco extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // contato@direitodeouvir.com.br
        return $this->from('contato@direitodeouvir.com.br')
            ->subject($this->assunto)
            ->view('mail.faleConosco')
            ->with(['seTiverAlgumaVarASerRenderizada' => $this->aVarASerRenderizada]);
    }
}
