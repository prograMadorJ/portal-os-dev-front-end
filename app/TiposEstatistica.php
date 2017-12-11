<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposEstatistica extends Model
{

    protected $fillable = ['nome'];

    public function banners_estatisticas() {
        return $this->hasMany('App\BannersEstatistica');
    }

    public function artigos_estatisticas() {
        return $this->hasMany('App\ArtigosEstatistica');
    }

}
