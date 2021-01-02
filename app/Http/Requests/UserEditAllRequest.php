<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditAllRequest extends FormRequest
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
        'cedula'=>'max:10|unique:users,cedula,'.$this->user->id,
        'username'=>'required|max:25|unique:users,username,'.$this->user->id,
        'email'=>'required|email|max:100|unique:users,email,'.$this->user->id,
        'estado'=>'required',
        'nombres'=>'max:50',
        'apellidos'=>'max:50',
        'cargo'=>'max:191'
        ];
    }

    public function attributes()
    {
      return [
        'username'=>'nombre de usuario',
        'email'=>'correo',
      ];
    }
}
