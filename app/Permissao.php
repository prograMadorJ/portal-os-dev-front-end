<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{

	protected $table = 'permissoes';

	protected $fillable = [
			'controlador', 'status'
		];

	public function itens_permissoes() {
		return $this->hasMany('App\ItemPermissao');
	}

	public static function rules() {
		return [
				'controlador' => 'required',
			];
	}

}
