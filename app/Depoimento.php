<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depoimento extends Model
{

    protected $fillable = ['nome', 'local', 'titulo', 'conteudo', 'media_id',
                'ordem', 'destaque', 'status', 'youtube_video'];

    public function media() {
        return $this->belongsTo('App\Media');
    }

    public static function rules($method = "POST", $id = null) {
        return [
            'nome' => 'required|max:100',
            'local' => 'required|max:100',
            'titulo' => 'required|max:100',
            'conteudo' => 'required',
            'ordem' => 'required'
        ];
    }

    public static function rulesCadastro($method = "POST", $id = null) {
        return [
            'nome' => 'required',
            'email' => 'required',
            'conteudo' => 'required'
        ];
    }

}
