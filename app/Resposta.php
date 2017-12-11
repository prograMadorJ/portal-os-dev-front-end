<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{

    protected $fillable = [
            'cliente_ip', 'http_user_agent', 'contato_id', 'alternativa_id'
        ];

    public function alternativa() {
        return $this->belongsTo('App\Alternativa');
    }

    public function contato() {
        return $this->belongsTo('App\Contato');
    }

}
