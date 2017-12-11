<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Script extends Model {

  protected $fillable = [
    'code',
    'status',
    'name',
    'local_id',
    'in_top'
  ];

  public function places() {
    return $this->belongsToMany('App\Local', 'local_scripts', 'script_id', 'local_id');
  }

}
