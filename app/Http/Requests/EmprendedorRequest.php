<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmprendedorRequest extends FormRequest
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
          'fec_nac'=>'required',
          'cedula'=>'required|max:10|min:10|unique:emprendedores,cedula',
          'nombres'=>'required|max:50',
          'apellidos'=>'required|max:50',
          'email'=>'required|email|max:100',
          'ciudad'=>'required|max:100',
          'direccion'=>'required|max:200',
          'celular'=>'required|max:10',
          'telefono'=>'max:10',
          'nom_idea'=>'required|max:255',
        ];
    }

    public function attributes(){
      return [
        'fec_nac' => 'Fecha de nacimiento',
        'cedula' => 'Cedula de ciudadania',
        'nom_idea' => 'Idea de negocio',
      ];
    }
}
