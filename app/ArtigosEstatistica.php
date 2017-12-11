<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtigosEstatistica extends Model
{

    protected $fillable = [
        'artigo_id', 'cliente_ip', 'http_user_agent', 'tipos_estatistica_id'
    ];

    public function tipos_estatisticas() {
        return $this->belongsTo('App\TiposEstatistica');
    }

    public function artigo() {
        return $this->belongsTo('App\Artigo');
    }

}
