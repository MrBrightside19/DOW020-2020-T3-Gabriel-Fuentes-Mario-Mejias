<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesRequest extends FormRequest
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
            'nombres'=> 'required|min:3|max:50',
            'apellidos'=> 'required|min:3|max:50',
            'rut'=> 'required|min:9|max:10|unique:clientes,rut',
            'edad'=> 'required|numeric|min:18|lte:70',
            'email'=> 'required|unique:clientes,email'
        ];
    }
    public function messages(){
        return [
            'nombres.required'=>'Indique sus Nombres',
            'nombres.min'=>'Nombre debe ser de 3 a 50 carácteres',
            'nombres.max'=>'Nombre debe ser de 3 a 50 carácteres',

            'apellidos.required'=>'Indique sus Apellidos',
            'apellidos.min'=>'Apellidos deben ser de 3 a 50 carácteres',
            'apellidos.max'=>'Apellidos deben ser de 3 a 50 carácteres',

            'edad.required'=>'Indique su Edad',
            'edad.min'=>'La edad minima es de 18 años',
            'edad.max'=>'La edad maxima es de 70 años',
            'edad.numeric'=>'La edad debe ser de tipo numérico',

            'rut.required'=>'Indique su RUT',
            'rut.min'=>'RUT debe ser minimo de 9 digitos',
            'rut.max'=>'RUT debe ser máximo de 10 digitos',
            'rut.unique'=>'RUT ya existente: :input ya existe',

            'email.required'=>'Indique su Correo Electrónico',
            'email.unique'=>'Correo Electrónico: :input ya existe'
        ];
    }
}
