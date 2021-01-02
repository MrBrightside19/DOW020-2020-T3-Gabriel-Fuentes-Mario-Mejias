<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Arriendo extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'arriendos';

    public function auto(){
        return $this->belongsTo('App\Models\Auto');
    }

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }


    private function sumTotalArriendos(){
        $suma = 0;
        foreach(Arriendo::all() as $arriendo){
            $suma = $suma + $arriendo->valorfinal;
        }
        return $suma;
    }

    public function getTotalIngresos(){
        return $this->sumTotalArriendos();
    }
}
