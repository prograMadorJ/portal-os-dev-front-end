<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoItemPermissao extends Model
{

    protected $table = 'grupos_itens_permissoes';

    protected $fillable = [
            'grupo_id', 'item_permissao_id'
        ];

    public function grupo() {
        return $this->belongsTo('App\Grupo');
    }

    public function grupos() {
        return $this->hasMany('App\Grupo');
    }

    public function item_permissao() {
        return $this->belongsTo('App\ItemPermissao');
    }

    public function itens_permissoes() {
        return $this->hasMany('App\ItemPermissoes');
    }

    public static function rules($method = "POST", $id = null) {
        return [
                'grupo_id' => 'required',
                'item_permissao_id' => 'required',
            ];
    }

}
