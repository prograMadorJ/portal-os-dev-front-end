<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaDerivative extends Model
{
    protected $fillable = [
        'media_id', 'media_parent_id', 'screen'
    ];

    public function media() {
        return $this->belongsTo('App\Media', 'media_id');
    }

    public function media_parent() {
        return $this->belongsTo('App\Media', 'media_parent_id', 'id');
    }

    /**
     * @return string
     */
    public function screens() {
        switch ($this->screen) {
            case 'xs':
                return "<756px";
            case 'sm':
                return ">756px";
            case 'md':
                return ">996px";
            case 'lg':
                return ">1200px";
            default:
                return "-";
        }
    }

}
