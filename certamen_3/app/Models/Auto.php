<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;
    protected $table = 'autos';

    public function tiposvehiculo(){
        return $this->belongsTo('App\Models\TipoVehiculo');
    }

    public function arriendos(){
        return $this->hasMany('App\Models\Arriendo');
    }
}
