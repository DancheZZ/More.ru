<?php

namespace App\Http\Controllers;

use App\Question;
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
                'email2' => 'required|email',
                'text' =>'required'
            ]);
        
        $questik = new Question();
        $questik->email = request('email2');
        $questik->text = request('text');
        $questik->status = 0;
        $questik->date = date("Y-m-d");
        $questik->save();

        return redirect('/question');
        
    }
}
