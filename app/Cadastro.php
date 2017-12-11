<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{

	protected $fillable = [
		'nome', 'email', 'telefone', 'tipo_cadastro_id', 'id_fonoaudiologo_indicador',
		'assunto', 'conteudo', 'status', 'cidade', 'cliente_ip', 'http_user_agent',
		'page_origin', 'is_spam',
	];

	public function tipo_cadastro() {
		return $this->belongsTo('App\TipoCadastro');
	}

	public function cidades() {
		return $this->belongsTo('App\GDO\Cidade', 'cidade', 'id_cidade');
	}

	public function historicos_contatos() {
		return $this->hasMany('App\HistoricosContato');
	}

	public static function rules($method = 'POST', $id = null) {
		return [
			'nome' => 'min:3|max:100|required',
			'telefone' => 'min:10|max:20'
		];
	}

}
