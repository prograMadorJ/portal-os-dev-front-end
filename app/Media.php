<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model {

    protected $fillable = [
        'arquivo', 'titulo', 'descricao', 'tipo_media_id', 'status', 'tamanho_arquivo'
    ];

    public function tipo_media() {
        return $this->belongsTo('App\TipoMedia');
    }

    public function media_derivatives() {
        return $this->hasMany('App\MediaDerivative', 'media_parent_id');
    }

    public function media_parent() {
        return $this->hasOne('App\MediaDerivative', 'media_id');
    }

    public function arquivo() {
        if ($this->arquivo != null) {
            if (Storage::disk('s3')->exists('/uploads/media/'.$this->id.'/'.$this->arquivo)) {
                return Storage::disk('s3')->url('uploads/media/'.$this->id.'/'.$this->arquivo);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function badge_size() {
        if ($this->tamanho_arquivo > 300001) {
            return 'badge-important';
        } elseif ($this->tamanho_arquivo > 100001) {
            return 'badge-warning';
        } else {
            return 'badge-success';
        }
    }

    public static function rules($method = "POST", $id = null) {
        return [
            'tipo_media_id' => 'required',
        ];
    }

}
