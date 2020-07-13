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
            'name' => 'required|min:8|max:70|regex:/^[\pL\s\-]+$/u',
            'category' => 'required',
            'price' => 'required|alpha_num',
            'description' => 'required',
            'photo' => 'image',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio. ',
            'name.regex' => 'El :attribute debe de ser solo letras',
            'name.min' => 'El :attribute debe contener mas de 8 letras',
            'name.max' => 'El :attribute debe contener maximo de 70 letras',
            'category.required' => 'El :attribute es obligatorio',
            'price.required' => 'El :attribute es obligatorio',
            'price.alpha_num' => 'El :attribute es obligatorio',
            'description.required' => 'El :attribute es obligatorio',
            'photo.required' => 'El :attribute es obligatorio',
            'photo.mimes' => 'El :attribute debe de ser una imagen',

        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Campo nombre',
            'category' => 'Campo categoria',
            'price' => 'Campo precio',
            'description' => 'Campo descripcion',
            'photo' => 'Campo foto',

        ];
    }
}
