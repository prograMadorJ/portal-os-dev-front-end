<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCadastro extends Model
{

    protected $fillable = [
            'descricao', 'status'
        ];

    public function cadastros() {
        return $this->hasMany('App\Cadastro');
    }

    public static function rules($method = 'POST', $id = null) {
        return [
                'descricao' => 'required',
            ];
    }

}
