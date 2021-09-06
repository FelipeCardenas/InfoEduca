<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
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
            'usuario_id' => 'required|unique'
        ];
    }

    Public function messages(){
        return [
            'nombre.required' => 'Ingrese el nombre del usuario',
            'usuario_id.required' => 'Ingrese el rut del usuario',
            'usuario_id.unique' => 'Usuario ya existe'
        ];
    }
}