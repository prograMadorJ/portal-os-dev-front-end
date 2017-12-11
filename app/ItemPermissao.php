<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPermissao extends Model
{

	protected $table = "itens_permissoes";

	protected $fillable = [
			'metodo', 'permissao_id', 'status'
		];

	public function permissao() {
		return $this->belongsTo('App\Permissao');
	}

	public function grupos() {
		return $this->belongsToMany("App\Grupo", 'grupo_itens_permissoes', 'item_permissao_id', 'grupo_id');
	}

	public static function rules() {
		return [
				'metodo' => 'required',
				'permissao_id' => 'required',
			];
	}

}
