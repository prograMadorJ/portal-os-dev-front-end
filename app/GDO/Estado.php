<?php

namespace App\GDO;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
	protected $fillable = [
		'descricao', 'sigla', 'ibge', 'status', 'id_pais', 'cep_faixa_inicio1', 'cep_faixa_fim1','cep_faixa_inicio2', 'cep_faixa_fim2'
	];

	protected $connection = 'gdo';

	protected $table = 'estados';

	protected $primaryKey = 'id_estado';

	public $timestamps = false;

	public function cidades() {
		return $this->hasMany('App\GDO\Cidade', 'id_estado', 'id_estado');
	}
}
