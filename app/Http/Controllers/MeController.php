<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MeController extends Controller
{
    function show()
    {
        if (!Auth::user())
        {
            return redirect('/main');
        }
        $projects = \App\Project::where('id_user',Auth::user()->id)->get();
        //dump($projects);
        return view('me',['projects'=>$projects]);
    }

    function checkUser()
    {
        //$em = $_POST['email'];
        //$pas = $_POST['password'];
        //$result = 'yes';
        //$result = 'no';
        $email = request('email');
        $pass = Hash::make (request('password'));

        $search = \App\User::where
        (
            [
                ['email',$email],
                ['password',$pass]
            ]
        )->get();

        if (!count($search)) return ['result' => 'no'];
        else return ['result' => 'yes'];
    }

    function changeAva()
    {
        request()->validate
        (
            [
                'avatar' =>['required','mimes: jpg,jpeg,png,bmp']
            ]
        );
        $image = request('avatar'); //получаем объект файла
        if(!$image)
        {
            return redirect("/me");
        }
        if ( $image ) $image->move(public_path('Images'), request('avatar')->getClientOriginalName() ); //помещаем его в папку с картинками
        $userik = \App\User::find(Auth::user()->id);
        $userik->avatar = request('avatar')->getClientOriginalName();
        $userik->save();
        return redirect('/me');
    }

    function changeMe()
    {
        request()->validate
        (
            [
                'name'=>['required','max:50'],
                'surname'=>['required','max:50']
                
            ]
        );

        $userik = \App\User::find(Auth::user()->id);
        $userik->name = request('name');
        $userik->surname = request('surname');
        $userik->save();
        return redirect('/me');
    }
}
