<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoricosContato extends Model
{

    protected $fillable = ['mensagem', 'user_id', 'from_id', 'from_model', 'cadastro_id'];

    public $models = ['Cadastro', 'User'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function cadastro() {
        return $this->belongsTo('App\Cadastro');
    }

    public static function rules($method = "POST", $id = null) {
        return [];
    }

}
