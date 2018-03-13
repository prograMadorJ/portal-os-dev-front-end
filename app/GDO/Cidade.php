<?php

namespace App\GDO;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
	protected $connection = 'gdo';

	protected $table = 'cidades';

	protected $primaryKey = 'id_cidade';

	public $timestamps = false;

	protected $fillable = [
		'descricao', 'uf', 'cep2', 'id_estado', 'cep', 'status', 'codigo_ibge'
	];

	public function estado() {
		return $this->belongsTo('App\GDO\Estado', 'id_estado', 'id_estado');
	}

	public function contatos() {
		return $this->hasMany('App\Cadastro', 'id_cidade', 'cidade');
	}

}
