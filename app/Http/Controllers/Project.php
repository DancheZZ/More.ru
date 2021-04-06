<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Project extends Controller
{
    public function index()
    {
        $articles = "Hello";
        return view('projects.index',['projects' => $articles]);
    }

    public function show($id)
    {
        return view('projects.show',['project' => $id]);
    }
}
