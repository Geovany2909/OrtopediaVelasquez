<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateFormUsers extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:8|max:64',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:8',
            'repeat_password' => 'required|same:password|min:8',
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
            'email.email' => 'El formato del :attribute debe ser una dirección de correo válida.',
            'email.unique' => 'El email ya está en uso',
            'email.required' => 'El :attribute es requerido',
            'password.required'=>'El :attribute es requerido',
            'password.min'=>'El :attribute debe de tener mínimo 8 carácteres',
            'repeat_password.required'=>':attribute es requerido',
            'repeat_password.same'=>'Las contraseñas no coinciden',
            'repeat_password.min'=>'El :attribute debe de tener mínimo 8 carácteres',
            'photo' => 'el :attribute debe de ser imágen',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'campo nombre',
            'email' => 'campo email',
            'password' => 'campo contraseña',
            'repeat_password' => 'campo confirmar contraseña',
            'photo' => 'campo foto'
        ];
    }
}
