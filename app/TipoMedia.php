<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMedia extends Model
{
    protected $fillable = [
    		'descricao', 'status'
    	];

    public function media() {
    	return $this->hasMany('App\Media');
    }

    public static function rules($method = "POST", $id = null) {
    	return [
    			'descricao' => 'required',
    		];
    }
}
