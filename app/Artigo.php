<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Artigo extends Model {

    protected $fillable = [
    		'titulo', 'conteudo', 'resumo', 'imagem', 'seo_id', 'status', 'url', 'imagem_titulo', 'link_titulo',
            'publicacao', 'agendado', 'user_id', 'imagem_tamanho', 'media_id'
    	];

    public function categorias() {
    	return $this->belongsToMany('App\Categoria', 'categoria_artigo', 'artigo_id', 'categoria_id');
    }

    public function seo() {
        return $this->belongsTo('App\Seo');
    }

    public function estatisticas() {
        return $this->hasMany('App\ArtigosEstatistica');
    }

    public function usuario() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function media() {
        return $this->belongsTo("App\Media");
    }

    public function recuperar_url() {
        if ($this->imagem != null) {
            if (Storage::disk('s3')->exists('/uploads/artigos/'.$this->id.'/'.$this->imagem)) {
                $this->imagem = Storage::disk('s3')->url('uploads/artigos/'.$this->id.'/'.$this->imagem);
            } else {
                $this->imagem = false;
            }
        } else {
            $this->imagem = false;
        }
    }

    public function badge_size() {
        if ($this->imagem_tamanho > 300001) {
            return 'badge-important';
        } elseif ($this->imagem_tamanho > 100001) {
            return 'badge-warning';
        } else {
            return 'badge-success';
        }
    }

    /**
    *
    * @todo Funcão para listar as categorias de um artigos
    * @param $separador indica a lista de separação das categorias
    * @param $qt indica a quantidade de categorias a ser exibida se for -1 exibe todas
    *
    **/
    public function listar_categorias($separador = ', ', $qt = -1) {
        $var = "";
        $size = count($this->categorias);
        $i = 1;
        foreach ($this->categorias as $categoria) {
            if ($qt == -1) {
                $var .= '<a title="' . $categoria->link_titulo . '" href="' . url('/blog/'.$categoria->url) . '">' . $categoria->nome . '</a>';
            } else {
                if ($i <= $qt) {
                    $var .= '<a title="' . $categoria->link_titulo . '" href="' . url('/blog/'.$categoria->url) . '">' . $categoria->nome . '</a>';
                }
            }
            if ($i < $size) {
                if ($qt == -1) {
                    $var .= $separador;
                } else {
                    if ($i < $qt) {
                        $var .= $separador;
                    }
                }
                $i++;
            }
        }
        return $var;
    }

    public static function rules($method = 'POST', $id = null) {
    	switch ($method) {
    		case 'POST':
    			return [
    					'titulo' => 'required|max:50',
    					'conteudo' => 'required',
                        'resumo' => 'max:90',
                        'url' => 'required|unique:artigos',
    				];
    		case 'PATCH':
    			return [
    					'titulo' => 'required|max:50',
    					'conteudo' => 'required',
                        'resumo' => 'max:90',
                        'url' => 'required|unique:artigos,url,'.$id,
    				];
    		default:
    			return [];
    	}
    }
}
