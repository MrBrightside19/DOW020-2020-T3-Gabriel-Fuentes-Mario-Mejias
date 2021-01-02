<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArriendosRequest extends FormRequest
{
    const fecharmax='2021-12-30';
    const fechaemax='2021-12-31';
    const horamax='23:00';
    const horamin='09:00';
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
            'fechar'=>'required|date_format:Y-m-d|after_or_equal:today|before_or_equal:'.self::fecharmax,
            'horar'=>'required|date_format:H:i|after_or_equal:'.self::horamin.'|before_or_equal:'.self::horamax,
            'fechae'=>'required|date_format:Y-m-d|after:today|before_or_equal:'.self::fechaemax,
            'horae'=>'required|date_format:H:i|after_or_equal:'.self::horamin.'|before_or_equal:'.self::horamax,
            'auto'=>'required|exists:autos,id',
            'cliente'=>'required|exists:clientes,id',
            'imagenv'=>'required'
        ];
    }

    public function messages(){
        return [
            'fechar.required'=>'Indique el dia de recogida del vehículo',
            'fechar.date_format'=>'Fecha recogida no válida',
            'fechar.after_or_equal'=>'Fecha recogida no válida',
            'fechar.before_or_equal'=>'Fecha recogida no válida, puede arrendar hasta el dia '.self::fecharmax,

            'horar.required'=>'Indique la hora de recogida del vehículo',
            'horar.date_format'=>'Hora recogida no válida',
            'horar.after_or_equal'=>'Hora no válida, puede recoger un vehículo desde las '.self::horamin,
            'horar.before_or_equal'=>'Hora no válida, puede recoger un vehículo hasta las '.self::horamax,

            'fechae.required'=>'Indique el dia de entrega del vehículo',
            'fechae.date_format'=>'Fecha entrega no válida',
            'fechae.after'=>'Fecha entrega no válida, no se puede entregar un vehículo el mismo día que fue solicitado',
            'fechae.before_or_equal'=>'Fecha entrega no válida, puede entregar hasta el '.self::fechaemax,

            'horae.required'=>'Indique la hora de entrega del vehículo',
            'horae.date_format'=>'Hora entrega no válida',
            'horae.after_or_equal'=>'Hora no válida, puede entregar un vehículo desde las '.self::horamin,
            'horae.before_or_equal'=>'Hora no válida, puede entregar un vehículo hasta las '.self::horamax,

            'auto.required'=>'Indique un auto para el arriendo',
            'auto.exists'=>'Auto no válido',

            'cliente.required'=>'Indique un cliente para el arriendo',
            'cliente.exists'=>'Cliente no válido',

            'imagenv.required'=>'Debe incluir imágen de entrega'
        ];
    }
}
