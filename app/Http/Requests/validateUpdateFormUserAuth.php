<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateUpdateFormUserAuth extends FormRequest
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
            'password' => 'required',
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
            'password.required' => 'el campo :attribute es requerido',
            'password.password' => 'La :attribute no coíncide con la registrada',
            'repeat_email.required' => ':attribute es requerido',
            'repeat_email.regex' => 'El formato de :attribute no es válido',
            'repeat_email.same' => 'Los correos no coinciden',
            'photo' => 'el :attribute debe de ser imágen',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'nombre',
            'email' => 'email',
            'repeat_email'=> 'confirmar email',
            'password' => 'contraseña',
            'photo' => 'Campo photo',
        ];
    }
}
