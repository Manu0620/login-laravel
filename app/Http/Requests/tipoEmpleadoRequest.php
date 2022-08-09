<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tipoEmpleadoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'descripcion' => 'required|regex:/^[a-zA-Z]+$/u',
        ];
    }
}
