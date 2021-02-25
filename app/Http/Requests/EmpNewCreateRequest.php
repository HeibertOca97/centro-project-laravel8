<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpNewCreateRequest extends FormRequest
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
          'nombres'=>'required|max:50',
          'apellidos'=>'required|max:50',
          'sexo'=>'required',
          'tipodoc'=>'required',
          'cedula'=>'required|max:10|min:10|unique:emprendedores,cedula',
          'nacionalidad'=>'required|max:50',
          'fec_nac'=>'required',
          'edad'=>'required|max:2',
          'celular'=>'required|max:10|min:10',
          'telefono'=>'max:10',
          'email'=>'required|email|max:100',
        ];
    }

    public function attributes(){
      return [
        'cedula' => 'numero de identificacion',
        'tipodoc' => 'tipo de documento',
        'fec_nac' => 'fecha de nacimiento',
        'email' => 'correo electronico',
      ];
    }
}
