<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
    public function main()
    {
        $quests =  \App\Question::get();
        $projects = \App\Project::where('published',0)->get();
        return view('admin.main',['quests' =>$quests,'projects'=>$projects]);
    }
}
