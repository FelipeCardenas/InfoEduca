<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ilimunate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    
    protected $table = 'eventos';

    public function usuarios(){
        return $this->belongsToMany('App\Usuario')->withPivot('entradas');
    }
    public function mensajes(){
      return $this->hasMany('App\Mensaje');
    }
    /*
    public function categoria(){
      return $this->belongsTo('App\Categoria','id');
    }
    */
    
}
