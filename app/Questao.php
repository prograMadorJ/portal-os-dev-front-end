<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{

    protected $table = "questoes";

    protected $fillable = [
            'pergunta', 'resposta', 'user_id', 'status'
        ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public static function rules($method = 'POST', $id = null) {
        return [
                'pergunta' => 'required',
                'pergunta' => 'max:100',
                'resposta' => 'required',
            ];
    }

}
