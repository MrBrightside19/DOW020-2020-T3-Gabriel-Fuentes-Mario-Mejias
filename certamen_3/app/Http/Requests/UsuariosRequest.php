<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
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
            'nombre'=> 'required|min:3|max:50',
            'apellido'=> 'required|min:3|max:50',
            'email'=> 'required|unique:usuarios,email',
            'pass'=> 'required|min:8|max:20'   
        ];
    }
    public function messages(){
        return [
            'nombre.required'=>'Indique su Nombre',
            'nombre.min'=>'Nombre debe ser de 3 a 50 carácteres',
            'nombre.max'=>'Nombre debe ser de 3 a 50 carácteres',

            'apellido.required'=>'Indique su Apellido',
            'apellido.min'=>'Apellidos debe ser de 3 a 50 carácteres',
            'apellido.max'=>'Apellidos debe ser de 3 a 50 carácteres',

            'email.required'=>'Indique su Correo Electrónico',
            'email.unique'=>'El Correo Electrónico: :input ya existe',

            'pass.required'=>'Indique su Contraseña',
            'pass.min'=>'Contraseña debe ser de 8 a 20 carácteres',
            'pass.max'=>'Contraseña debe ser de 8 a 20 carácteres'
        ];
    }
}
