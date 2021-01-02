<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'clientes';

    public function arriendos(){
        return $this->hasMany('App\Models\Arriendo');
    }
}
