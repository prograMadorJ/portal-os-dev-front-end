<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable = [
    		'meta_titulo', 'meta_descricao', 'fb_titulo', 'fb_imagem', 'fb_descricao', 'tw_titulo', 'tw_descricao', 'tw_imagem',
    		'status', 'tweet'
    	];

    public function artigo() {
    	return $this->hasOne('App\Artigo');
    }

    public function categoria() {
    	return $this->hasOne('App\Categoria');
    }

    public function produto() {
        return $this->hasOne('App\Produto');
    }

    public static function rules() {
    	return [
    			'meta_titulo' => 'required',
    			'meta_descricao' => 'required',
    		];
    }
}
