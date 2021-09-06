<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMensajeRequest extends FormRequest
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
            'asunto' => 'required',
            'email' => 'required',
            'mensaje' => 'required'
  
        ];
    }

    Public function messages(){
        return [
            'asunto.required' => 'Ingrese el asunto',
            'email.required' => 'Ingrese el e-mail',
            'mensaje.required' => 'Ingrese el mensaje'

        ];
    }
}
