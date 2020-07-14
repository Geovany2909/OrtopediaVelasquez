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
            'name.regex' => 'El :attribute debe ser solo letras',
            'name.min' => 'El :attribute debe de tener minimo 8 caracteres',
            'name.max' => 'El :attribute debe de tener maximo 64 caracteres',
            'email.regex' => 'El formato del :attribute no es valido',
            'email.required' => 'El :attribute es requerido',
            'repeat_email.required' => ':attribute es requerido',
            'repeat_email.regex' => 'El formato de :attribute no es valido',
            'repeat_email.same' => 'email y :attribute no coinciden',
            'photo' => 'el :attribute debe de ser imagen',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'nombre',
            'email' => 'email',
            'repeat_email'=> 'confirmar email',
            'photo' => 'Campo photo',
        ];
    }
}
