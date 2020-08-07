<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateUpdateFormUserless extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:8|max:64',
            'email' => 'regex:/^.+@.+$/i|required',
            'repeat_email' => 'same:email|required|regex:/^.+@.+$/i',
            'photo' => 'image',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El :attribute es requerido',
            'name.regex' => 'El :attribute debe contener solo letras',
            'name.min' => 'El :attribute debe de tener mínimo 8 carácteres',
            'name.max' => 'El :attribute debe de tener máximo 64 carácteres',
            'email.regex' => 'El formato del :attribute no es válido',
            'email.required' => 'El :attribute es requerido',
            'repeat_email.required' => 'El :attribute es requerido',
            'repeat_email.regex' => 'El formato de :attribute no es válido',
            'repeat_email.same' => 'Correo y :attribute no coinciden',
            'photo' => 'el :attribute debe de ser imágen',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'nombre',
            'email' => 'correo',
            'repeat_email'=> 'confirmar correo',
            'photo' => 'Campo foto',
        ];
    }
}
