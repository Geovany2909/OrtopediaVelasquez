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
            'name.regex' => 'El :attribute debe ser solo letras',
            'name.min' => 'El :attribute debe de tener minimo 8 caracteres',
            'name.max' => 'El :attribute debe de tener maximo 64 caracteres',
            'email.email' => 'El formato del :attribute debe ser una dirección de correo válida.',
            'email.unique' => 'El email ya esta en uso',
            'email.required' => 'El :attribute es requerido',
            'password.required'=>'El :attribute es requerido',
            'password.min'=>'El :attribute debe de tener minimo 8 caracteres',
            'repeat_password.required'=>'El :attribute es requerido',
            'repeat_password.same'=>'Las contraseñas no coinciden',
            'repeat_password.min'=>'El :attribute debe de tener minimo 8 caracteres',
            'photo' => 'el :attribute debe de ser imagen',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Campo nombre',
            'email' => 'campo email',
            'password' => 'Campo password',
            'repeat_password' => 'Campo confirmar contraseña',
            'photo' => 'Campo photo'
        ];
    }
}
