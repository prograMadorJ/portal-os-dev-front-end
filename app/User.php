<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'grupo_id', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function artigos() {
        return $this->hasMany('App\Artigo');
    }

    public static function rules($method, $id) {
        switch ($method) {
            case 'POST':
                return [
                    'name' => 'required',
                    'email' => 'required|unique:users',
                    'password' => 'required|min:6|confirmed',
                ];
            case 'PATCH':
                return [
                    'name' => 'required',
                    'email' => 'required|unique:users,email,'.$id,
                    'password' => 'confirmed',
                ];
            default:
                return [];
        }
    }

    /**
    * Faz o controle de permissão do usuário
    **/
    public function pode($controller, $method) {
        $grupo = $this->grupo;
        if ($grupo) {
            if ($grupo->nome == 'Admin')
                return true;
            $itens = $grupo->itens_permissoes;
            foreach ($itens as $item) {
                if ($item->metodo == $method && $item->permissao->controlador == $controller) {
                    return true;
                }
            }
        }
        return false;
    }

    public function grupo() {
        return $this->belongsTo('App\Grupo');
    }
}
