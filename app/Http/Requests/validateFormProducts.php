<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateFormProducts extends FormRequest
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
            'photo' => 'required|image',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio. ',
            'name.regex' => 'El :attribute debe contener solo letras',
            'name.min' => 'El :attribute debe contener mínimo 4 letras',
            'name.max' => 'El :attribute debe contener máximo de 70 letras',
            'category.required' => 'El :attribute es obligatorio',
            'price.required' => 'El :attribute es obligatorio',
            'price.regex' => 'El formato del :attribute es inválido (p.e: 20.20)',
            'description.required' => 'El :attribute es obligatorio',
            'photo.required' => 'El :attribute es obligatorio',
            'photo.image' => 'El :attribute debe contener imágenes',

        ];
    }

    public function attributes()
    {
        return [
            'name' => 'campo nombre',
            'category' => 'campo categoría',
            'price' => 'campo precio',
            'description' => 'campo descripción',
            'photo' => 'campo foto',

        ];
    }
}
