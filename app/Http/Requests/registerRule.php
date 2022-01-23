<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRule extends FormRequest
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
            "nombre"=>'required|min:2',
            "app"=>'required|min:2',
            "apm"=>'required|min:2',
            "email"=>'required|email',
            "calle"=>'required|min:5',
            "col"=>'required|min:5',
            "numero"=>'required',
            "col"=>'required|min:5',
            "cp"=>'required|size:5',
            "phone"=>'required',
            "rfc"=>'required|size:13',
            "files"=>'required|array',
            "puesto"=>'required|exists:puestos,id'
        ];
    }
}
