<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        //показывает список проектов, в дальнейшем нужно будет реализовать постраничный вывод
        $articles = "Hello";
        return view('projects.index',['projects' => $articles]);
    }

    public function show($id)
    {
        //показывает вьюшку конкретного проекта
        return view('projects.show',['project' => $id]);
    }

    public function store()
    {
        //сохраняет новый ресурс
    }

    public function create()
    {
        //вызывает вьюшку для создания проекта
    }

    public function destroy()
    {
        //ясен пень уничтожение
    }

    public function update()
    {
        //сохраняет редактируемую запись
    }

    public function edit()
    {
        //показывает вьюшку для редактирования существующего
    }
}
