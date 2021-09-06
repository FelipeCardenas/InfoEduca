<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table ="usuarios";
/*
    public function mensajes(){
        return $this->hasMany('App\Mensaje','rut');
      }
*/
      public function eventos(){
        return $this->belongsToMany('App\Evento')->withPivot('entradas');
      }
      public function mensajes(){
        return $this->hasMany('App\Mensaje');
      }
}
