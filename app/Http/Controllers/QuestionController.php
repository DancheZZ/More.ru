<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuestionController extends Controller
{
    public function show()
    {
        return view('question');
    }

    public function store()
    {
        request()->validate(
            [
                'email' => 'required|email',
                'text' =>'required'
            ]);
        //изменить язык текста ошибок
        $mail = request('email');

        Mail::raw('It works!', function($message)
        {
            $message->to("dancher228228@gmail.com")->subject('Hello There');
        });

        return redirect('/question');
        
    }
}
