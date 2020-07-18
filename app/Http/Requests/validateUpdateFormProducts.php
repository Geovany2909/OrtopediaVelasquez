<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateUpdateFormProducts extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:4|max:70|regex:/^[\pL\s\-]+$/u',
            'category' => 'required',
            'price' => 'required|regex:/^\d*(\.\d{2})?$/',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio. ',
            'name.regex' => 'El :attribute debe de ser solo letras',
            'name.min' => 'El :attribute debe contener minimo 4 letras',
            'name.max' => 'El :attribute debe contener maximo de 70 letras',
            'category.required' => 'El :attribute es obligatorio',
            'price.required' => 'El :attribute es obligatorio',
            'price.regex' => 'El formato del :attribute es invalido (ejemplo: 20.20)',
            'description.required' => 'El :attribute es obligatorio',

        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Campo nombre',
            'category' => 'Campo categoria',
            'price' => 'Campo precio',
            'description' => 'Campo descripcion',
        ];
    }
}
