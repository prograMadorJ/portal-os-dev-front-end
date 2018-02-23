<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
		'nome', 'resumo', 'url', 'descricao', 'status', 'categoria_id', 'link_titulo', 'seo_id'
	];

    protected $table = 'categorias';

    public function categoria() {
    	return $this->belongsTo('App\Categoria');
    }

    public function categorias() {
    	return $this->hasMany("App\Categoria");
    }

    public function artigos() {
    	return $this->belongsToMany("App\Artigo", 'categoria_artigo', 'categoria_id', 'artigo_id');
    }

    public function seo() {
        return $this->belongsTo('App\Seo');
    }

    public static function rules($method = 'POST', $id = null) {
    	switch ($method) {
    		case 'POST':
    			return [
    					'nome' => 'required|unique:categorias',
                        'descricao' => 'required',
                        'url' => 'required|unique:categorias',
    				];
    			break;
    		case 'PATCH':
    			return [
    					'nome' => 'required|unique:categorias,nome,'.$id,
                        'descricao' => 'required',
                        'url' => 'required|unique:categorias,url,'.$id,
    				];
    			break;
    		default:
    			return [];
    			break;
    	}
    }

}
