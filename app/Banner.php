<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model {

    protected $fillable = [
        'imagem', 'imagem_titulo', 'link', 'target', 'titulo', 'subtitulo', 'botao_texto',
        'botao_link', 'periodo_inicio', 'periodo_final', 'status', 'local_id', 'indice', 'nome',
        'media_id'
    ];

    public function local() {
        return $this->belongsTo('App\Local');
    }

    public function banners_estatisticas() {
        return $this->hasMany("App\BannersEstatistica");
    }

    public function media() {
        return $this->belongsTo('App\Media');
    }

    public function recuperar_url() {
        if (Storage::disk('s3')->exists('/uploads/banners/'.$this->id.'/'.$this->imagem)) {
            $this->imagem = Storage::disk('s3')->url('uploads/banners/'.$this->id.'/'.$this->imagem);
        } else {
            $this->imagem = null;
        }
    }

    public static function rules($method = "POST", $id = null) {
        switch ($method) {
            case 'POST':
                return [
                    'media_id' => 'required',
                    'link' => 'required',
                    'target' => 'required',
                    'periodo_inicio' => 'required',
                    'periodo_final' => 'required',
                    'local_id' => 'required',
                    'indice' => 'required',
                    'nome' => 'required|unique:banners',
                ];
                break;
            case 'PATCH':
                return [
                    'media_id' => 'required',
                    'link' => 'required',
                    'target' => 'required',
                    'periodo_inicio' => 'required',
                    'periodo_final' => 'required',
                    'local_id' => 'required',
                    'indice' => 'required',
                    'nome' => 'required',
                ];
                break;
            default:
                break;
        }
    }

}
