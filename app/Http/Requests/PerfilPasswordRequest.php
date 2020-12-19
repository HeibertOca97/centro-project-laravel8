<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilPasswordRequest extends FormRequest
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
            'contraseñaActual'=>'required|min:8|max:15',
            'contraseñaNueva'=>'required|min:8|max:15',
            'contraseñaConfirmacion'=>'required|min:8|max:15|same:contraseñaNueva'
        ];
    }

    public function attributes()
    {
      return [
        'contraseñaActual'=>'contraseña actual',
        'contraseñaConfirmacion'=>'contraseña de confirmacion',
        'contraseñaNueva'=>'contraseña nueva'
      ];
    }
}
