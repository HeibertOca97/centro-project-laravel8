<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
          'username'=>'required|max:25|unique:users,username,'.$this->user->id,
          'email'=>'required|email|max:100|unique:users,email,'.$this->user->id,
          'status'=>'required|in:1,0',
        ];
    }

    public function attributes()
    {
      return [
        'username'=>'nombre de usuario',
        'email'=>'correo',
        'password'=>'contraseña',
        'status'=>'estado',
      ];
    }
    
}
