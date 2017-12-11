<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{

    protected $table = 'local';

    protected $fillable = [
        'descricao', 'status', 'name'
    ];

    public function banners() {
        $this->hasMany('App\Banner');
    }

    public static function rules($method = 'POST', $id = null) {
        switch ($method) {
            case 'POST':
                return [
                    'descricao' => 'required|unique:local',
                ];
            case 'PATCH':
                return [
                    'descricao' => 'required|unique:local,descricao,'.$id
                ];
            default:
                return [
                    'descricao' => 'required',
                ];
        }
    }

}
