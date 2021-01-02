<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoVehiculo extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'tiposvehiculos';

    public function autos(){
        return $this->hasMany('App\Models\Auto');
    }
}
