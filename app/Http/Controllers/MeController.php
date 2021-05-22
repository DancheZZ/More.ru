<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    function changeAva()
    {
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
