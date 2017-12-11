<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    
	protected $fillable = [
			'nome', 'status'
		];

	public function usuarios() {
		return $this->hasMany('App\User');
	}

	public function itens_permissoes() {
		return $this->belongsToMany('App\ItemPermissao', 'grupos_itens_permissoes', 'grupo_id', 'item_permissao_id');
	}

	public static function rules() {
		return [
				'nome' => 'required'
			];
	}

}
