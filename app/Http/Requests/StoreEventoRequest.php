<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventoRequest extends FormRequest
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
            'nombre' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required',
            'fecha' => 'required|after_or_equal:today',
            'descripcion' => 'required'
        ];
    }

    Public function messages(){
        return [
            'nombre.required' => 'Ingrese el nombre de la actividad',
            'direccion.required' => 'Ingrese la dirección de la actividad',
            'ciudad.required' => 'Ingrese la ciudad de la actividad',
            'fecha.required' => 'Ingrese la fecha de la actividad',
            'fecha.after_or_equal' => 'La fecha ingresada debe ser mayor o igual a la actual',
            'descripcion.required' => 'Ingrese la descripción de la actividad '
        ];
    }
}
