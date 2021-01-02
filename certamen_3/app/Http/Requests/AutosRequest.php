<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'anio'=>'required|numeric|min:1998',
            'imagen'=>'required',
            'patente'=>'required|min:8|max:8',
            'tipovehiculo'=>'required'
        ];
    }
    public function messages(){
        return [
            'anio.required'=>'Debe indicar el año del vehículo',
            'anio.min'=>'El año minimo debe ser de 1998',
            'anio.numeric'=>'Año invalido, debe ser numérico',

            'imagen.required'=>'Debe ingresar imagen',

            'patente.required'=>'Debe ingresar una patente',
            'patente.min'=>'El minimo de digitos son 8',
            'patente.max'=>'El maximo de digitos son 8',

            'tipovehiculo.required'=>'Debe ingresar un vehículo',
            
        ];
    }
}
