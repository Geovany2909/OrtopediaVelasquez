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
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:4',
            'email' =>  'required|email',
            'comment' =>  'required',
            'phone' => 'required|phone:ES,AUTO',
            recaptchaFieldName() => recaptchaRuleName()
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El :attribute es requerido',
            'name.regex' => 'El :attribute solo debe contener letras y espacios',
            'name.min' => 'mínimo deben de ser 4 caracteres en el :attribute',
            'email.required' => 'El :attribute es requerido',
            'email.email' => 'El :attribute debe de ser un email válido',
            'comment.required' => 'El :attribute es requerido',
            'phone.required' => 'El :attribute es requerido',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Campo nombre',
            'email' => 'Campo email',
            'comment' => 'Campo comentario',
            'phone' => 'Campo teléfono'
        ];
    }
}
