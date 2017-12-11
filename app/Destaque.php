<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destaque extends Model
{
    protected $fillable = [
    		'indice', 'artigo_id', 'status', 'agendado'
    	];

    public function artigo() {
    	return $this->belongsTo('App\Artigo');
    }

    public static function rules($method = "POST", $id = null) {
    	return [
    			'indice' => 'required',
    			'artigo_id' => 'required',
    		];
    }
}
