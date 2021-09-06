<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    
    public function evento(){
        return $this->belongsTo('App\Evento');
    }
    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }
}
