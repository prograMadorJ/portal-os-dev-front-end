<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpamsList extends Model {

    /**
     * @var $fillable
     */
    protected $fillable = [
        'domain'
    ];

    /**
     * @todo Validar fields
     */
    public static function rules($method = "POST", $id = null) {
        switch ($method) {
            case 'PATCH':
                return [
                    'domain' => 'required|unique:spams_lists,domain,'.$id
                ];
            default:
                return [
                    'domain' => 'required|unique:spams_lists'
                ];
        }
    }

}
