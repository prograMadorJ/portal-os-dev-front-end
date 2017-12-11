<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{

    protected $fillable = ['origem', 'destino'];

    public static function rules($param = "POST", $id = null) {
        return [
            'origem' => 'required',
            'destino' => 'required'
        ];
    }

}
