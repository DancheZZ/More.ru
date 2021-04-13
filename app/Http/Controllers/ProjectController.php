<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /*public function index()
    {
        //показывает список проектов, в дальнейшем нужно будет реализовать постраничный вывод
        $projects = "Hello";
        $kek = new Project();
        return view('projects.index',['projects' => $projects]);
    }*/

    //метод для вывода проектов на главной странице постранично ($page) согласно какому-то типу ($type)
    //возможные значения для type: all(все),popular(популярные),new(новые),soon(скоро).
    public function mainShow($type,$page)
    {
        $projects = null;
        //здесь и далее выводятся только незавершенные проекты (так ли?)
        switch($type)
        {
            //выдаются проекты в случайном порядке
            case 'all':
                $projects = Project::where([
                    ['published',1],
                    ['completed',0] ])->inRandomOrder()->skip(3*$page-3)->limit(3)->get();
                //skip - пропускает несколько записей, limit - предел вывода
                //inRandomOrder() - обеспечивает случайный порядок
                break;  

            //сортировка по кол-ву лайков по убыванию
            case 'popular':
                $projects = Project::where([
                    ['published',1],
                    ['completed',0] ])->orderBy('count_likes','desc')->skip(3*$page-3)->limit(3)->get();
                 //descend - спускаться
                //ascend - подниматься
                break;

            //сортировка по дате создания, для простоты берется сортировка по id, что эквивалентно и даже лучше, чем по start_date
            case 'new':
                $projects = Project::where([
                    ['published',1],
                    ['completed',0] ])->orderBy('id','desc')->skip(3*$page-3)->limit(3)->get();
                break;

            //сортировка по дате завершения по у
            case 'soon':
                $projects = Project::where([
                    ['published',1],
                    ['completed',0] ])->orderBy('finaldate','desc')->skip(3*$page-3)->limit(3)->get();
                break;
        }
        return view('main')->with(array('projects'=>$projects));
    }
    
    //{type}/{sorting}/{page}
    //метод для вывода всех проектов на странице всех проектов
    //возможные значения type:
    //working(собирают),completed(завершились),record(рекордсмены).
    public function listShow($type,$sorting,$page)
    {
        $projects = null;
        
        return view('projects.list', ['projects'=>$projects]);
    }
    
    /* public function show($id,$type)
    {
        //показывает вьюшку конкретного проекта
        $project = Project::find($id);
        //будет выведен проект либо с описанием в нижнем подразделе, либо спонсоры, либо комментарии
        return view('projects.show',['project' => $project,'type'=>$type]);
    }*/

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
