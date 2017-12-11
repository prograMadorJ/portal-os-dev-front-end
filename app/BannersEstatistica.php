<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannersEstatistica extends Model
{

    protected $fillable = [
        'banner_id', 'tipos_estatistica_id', 'cliente_ip', 'http_user_agent'
    ];

    public function banner() {
        return $this->belongsTo('App\Banner');
    }

    public function tipos_estatistica() {
        return $this->belongsTo('App\TiposEstatistica');
    }

}
