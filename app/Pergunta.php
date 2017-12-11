<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Pergunta extends Model
{
    protected $fillable = [
            'titulo', 'teste_id', 'ordem', 'status', 'imagem'
        ];

    public function teste() {
        return $this->belongsTo('App\Teste');
    }

    public function alternativas() {
        return $this->hasMany('App\Alternativa');
    }

    public function recuperar_url() {
        if ($this->imagem != null) {
            if (Storage::disk('s3')->exists('/uploads/perguntas/'.$this->id.'/'.$this->imagem)) {
                $this->imagem = Storage::disk('s3')->url('uploads/perguntas/'.$this->id.'/'.$this->imagem);
            } else {
                $this->imagem = false;
            }
        } else {
            $this->imagem = false;
        }
    }

    public static function rules($method = "POST", $id = null) {
        return [
                'titulo' => 'required'
            ];
    }
}
