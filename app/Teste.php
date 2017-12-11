<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teste extends Model
{

    protected $fillable = [
            'nome', 'descricao', 'status'
        ];

    public function perguntas() {
        return $this->hasMany('App\Pergunta');
    }

    public static function rules($method = "POST", $id = null) {
        switch ($method) {
            case 'POST':
                return [
                        'nome' => 'required|max:100|unique:testes'
                    ];
                break;
            case 'PATCH':
                return [
                        'nome' => 'required|max:100|unique:testes,nome,'.$id
                    ];
                break;
            default:
                break;
        }
    }

}
