<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        //показывает список проектов, в дальнейшем нужно будет реализовать постраничный вывод
        $articles = "Hello";
        $kek = new Project();
        return view('projects.index',['projects' => $articles]);
    }

    public function show($id,$type)
    {
        //показывает вьюшку конкретного проекта
        $project = Project::find($id);
        //будет выведен проект либо с описанием в нижнем подразделе, либо спонсоры, либо комментарии
        return view('projects.show',['project' => $project,'type'=>$type]);
    }

    public function store()
    {
        //сохраняет новый ресурс
    }

    public function create()
    {
        //вызывает вьюшку для создания проекта
    }

    public function update()
    {
        //сохраняет редактируемую запись
    }

    public function edit()
    {
        //показывает вьюшку для редактирования существующего
    }

    public function destroy()
    {
        //ясен пень уничтожение
    }
}
