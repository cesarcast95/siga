<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionCurriculum extends FormRequest
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
            'cedula'            =>     'numeric | required | digits_between:6,10 | unique:curriculum,cedula',
            'nombre'            =>     'required | max:100',
            'sexo'              =>     'required',
            'email'             =>     'required | email | max:100',
            'telefono'          =>     'required | digits_between:7,10',
            'grado_academico'   =>     'required',
            'carrera_id'        =>     'required',
            'fecha_disposicion' =>     'required',
            'disponibilidad'    =>     'required',
            'planta'            =>     'required',


        ];
    }
    public function messages()
    {
        return [
            'cedula.unique' => 'Ya existe una cédula con ese número'
        ];
    }
}
