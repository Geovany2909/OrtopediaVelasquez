<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class validateContactForm extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'  =>  'required', 'regex:/^[\pL\s\-]+$/u|min:8|max:64',
            'email' =>  'required|email',
            'comment' =>  'required',
            'phone' => 'required|alpha_num'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El :attribute es requerido',
            'name.regex' => 'El :attribute debe ser solo letras',
            'email.required' => 'El :attribute es requerido',
            'email.email' => 'El :attribute es requerido',
            'comment.required' => 'El :attribute es requerido',
            'phone.required' => 'El :attribute es requerido',
            'phone.alpha_num' => 'El :attribute solo debe de tener numeros',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Campo Nombre',
            'email' => 'Campo Email',
            'comment' => 'Campo Comentario',
            'phone' => 'Campo Telefono'
        ];
    }
}
