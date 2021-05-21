<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Admin extends Controller
{
    public function main()
    {
        if (!Auth::user() )
        {
            return redirect('/main');
        }
        
        if (!Auth::user()->is_admin)
        {
            return redirect('/main');
        }
        $quests =  \App\Question::get();
        $projects = \App\Project::where('published',0)->get();
        return view('admin.main',['quests' =>$quests,'projects'=>$projects]);
    }

    public function request($id)
    {
        if (!Auth::user() )
        {
            return redirect('/main');
        }

        if (!Auth::user()->is_admin)
        {
            return redirect('/main');
        }

        $requestik = \App\Project::where
        (
        [
            ['id',$id],
            //['published',0]
        ]
        )->get();
        $author = \App\User::where('id',$requestik[0]->id_user)->get();
        $countDays = floor((  strtotime($requestik[0]->final_date) - strtotime(date("y.m.d")) )/ (60*60*24));
        $descripton = $requestik[0]->description;
        return view('admin.request',
        [
        'project'=>$requestik[0], 
        'author' => $author,
        'countDays'=> $countDays,
        'description'=>$descripton,
        ]);
    }

    function setResponse($id)
    {
        if (!Auth::user() )
        {
            return redirect('/main');
        }
        if (!Auth::user()->is_admin)
        {
            return redirect('/main');
        }

        request()->validate
        (
            [
                'text'=>['required','max:180']
            ]
        );

        $project =\App\Project::find($id);
        $project->comment_moderator = request('text');
        $project->save();
        return redirect('/admin/main');
    }

    function accept($id)
    {
        if (!Auth::user() )
        {
            return redirect('/main');
        }

        if (!Auth::user()->is_admin)
        {
            return redirect('/main');
        }

        $project = \App\Project::find($id);
        $project->published = 1;
        $project->save();
        return redirect('/admin/main');
    }

    function deleteComment($id)
    {
        if (!Auth::user() )
        {
            return redirect('/main');
        }
        
        if (!Auth::user()->is_admin)
        {
            return redirect('/main');
        }

        \App\Comment::find($id)->delete();
    }
}
