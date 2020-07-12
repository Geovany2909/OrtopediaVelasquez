<?php

namespace App\Http\Controllers;

use App\Http\Requests\validateContactForm;
use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;


class MailController extends Controller
{
    public function index()
    {
        return view('contactenos');
    }

    public function send(validateContactForm $request)
    {
        // $this->validate($request, [
        //     'name'     =>  'required', 'regex:/^[\pL\s\-]+$/u|min:8|max:64',
        //     'email'  =>  'required|email',
        //     'comment' =>  'required',
        //     'phone' => 'required|alpha_num'
        // ]);

        $data = array(
            'name'      =>  $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'comment' => $request->input('comment'),
        );

        $mail_to = "anonymousma4@gmail.com";
        Mail::to($mail_to)->send(new SendMail($data));
        Alert::success('ENVIADO!!', 'Su informacion fue enviada');
        return redirect()->back();
    }
}
