<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model
{

    protected $fillable = [
            'titulo', 'observacoes', 'verdadeira', 'peso', 'pergunta_id', 'ordem', 'status'
        ];

    public function pergunta() {
        return $this->belongsTo('App\Pergunta');
    }

    public function respostas() {
        return $this->hasMany('App\Resposta');
    }

    public static function rules($method = "POST", $id = null) {
        return [
                'titulo' => 'required',
                'pergunta_id' => 'required'
            ];
    }

}
