<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
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
                $projects = Project::where
                ([
                    ['published',1] 
                ])->inRandomOrder()->skip(3*$page-3)->limit(3)->get();
                //skip - пропускает несколько записей, limit - предел вывода
                //inRandomOrder() - обеспечивает случайный порядок
                break;  

            //сортировка по кол-ву лайков по убыванию
            case 'popular':
                $projects = Project::where
                ([
                    ['published',1]
                ])
                    ->orderBy('count_likes','desc')->skip(3*$page-3)->limit(3)->get();
                 //descend - спускаться
                //ascend - подниматься
                break;

            //сортировка по дате создания, для простоты берется сортировка по id, что эквивалентно и даже лучше, чем по start_date
            case 'new':
                $projects = Project::where
                ([
                    ['published',1]
                ])->orderBy('id','desc')->skip(3*$page-3)->limit(3)->get();
                break;

            //сортировка по дате завершения по final_date по убыванию
            case 'soon':
                $projects = Project::where
                ([
                    ['published',1]
                ])->orderBy('final_date','desc')->skip(3*$page-3)->limit(3)->get();
                break;
        }
        //return view('main')->with(array('projects'=>$projects));
        
        return ['projects'=> $projects];
    }
    
    //{type}/{sorting}/{page}
    //метод для вывода всех проектов на странице всех проектов
    //возможные значения type:
    //working(собирают), только незавершенные проекты начиная новыми
    //completed(завершились), только завершенные проекты 
    //record(рекордсмены). сортировка по собранным деньгам по убыванию
    //
    //возможные значения sorting
    //popular (сначала с наибольшим количеством лайков)
    //unknown (сначала с наименьшим количеством лайков)
    //new (сначала новые)
    //old (сначала старые)

    public function listShow($type,$sorting,$page)
    {
        $projects = null;
        $forward = null; //по убыванию или возрастанию (desc или ask)
        $field = null; //поле по которому сортировка (count_likes или start_date)
        /*if($sorting == 'new' || $sorting=='unknown')
        {
            $forward = 'asc';
        }*/

        switch($sorting)
        {
            case 'popular':
                $forward = 'desc';
                $field = 'count_likes';
                break;
            case 'unknown':
                $forward = 'asc';
                $field = 'count_likes';
                break;
            case 'new':
                $forward = 'desc';
                $field = 'id';
                break;
            case 'old':
                $forward='asc';
                $field = 'id';
                break;
        }

        switch($type)
        {
            case 'working':
                $projects = Project::where
                ([
                    ['published',1],
                    ['completed',0] 
                ])
                    ->orderBy($field,$forward)->skip(3*$page-3)->limit(3)->get();
                break;
            case 'completed':
                $projects = Project::where
                ([
                    ['published',1],
                    ['completed',1] 
                ])
                    ->orderBy($field,$forward)->skip(3*$page-3)->limit(3)->get();
                break;
            case 'record':
                $projects = Project::where
                ([
                    ['published',1]
                ])
                ->orderBy('collected_money','desc')->orderBy($field,$forward)->skip(3*$page-3)->limit(3)->get();
                break;
        }

        
        
        return view('projects.list', ['projects'=>$projects]);
    }
    
    public function showDescr($id)
    {
        $project = Project::find($id);
        return view('project.show',['project' => $project]);
    }

    //метод для показа одного проекта
    //принимает на вход id проекта и specific 
    //возможные значения specific: description, comments,sponsors
    public function showSpecific($id,$specific = 'description' )
    {
        $project = Project::find($id);
        if(!$project)
        {
            die('404');
        }
        $descripton = null;
        $comments = null;
        $sponsors = null;
        //в зависимости от значения $specific одна из переменных созданных выше станет не нулевой, 
        //что обработается в представлении при помощи управляющих конструкций
        switch($specific)
        {
            case 'description':
                $descripton = $project->description;
                break;
            case 'comments':
                $comments = \App\comment::where('id_project','=',$id)->get();
                break;
            case 'sponsors':
                //поиск айди пользователей, которые поддержали проект
                $users_id = \App\donate::select('id_user')->where('id_project','=',$id)->get();
                //dump($users_id);
                //поиск пользователей спонсоров
                $sponsors = \App\User::whereIn('id',$users_id)->get();
               // dump($sponsors);
                break;
        }
        return view('projects.show',['project'=>$project,'description'=>$descripton,'comments'=>$comments,'sponsors'=>$sponsors]);

    }
    
    public function store()
    {
        //сей метод сохраняет новый ресурс
        //валидация 
        request()->validate
        (
            [
                'subjects'=>['required','max:20'],
                'money_required'=>['required','numeric'],
                'description' =>['required','max:180'],
                'final_date' =>['required','numeric'],
                'name' =>['required','max:30']
            ]
        );

        $project = new Project();//создание объетка модели
        $project->subjects = request('subjects');
        $project->money_required = request('money_required');
        $project->collected_money = 0;
        $project->description = request('description');
        $project->count_likes = 0;
        $project->count_dislikes =0;
        $project->start_date = date("Y-m-d");
        $project->final_date = strftime("%Y/%m/%d", strtotime($project->start_date." +".request('final_date') ." day"));
        $project->completed = 0;
        $project->comment_moderator = null;
        $project->published = 0;
        $project->name = request('name');
        $image = request('image'); //получаем объект файла
        $image->move("D:\OpenServer\OpenServer\domains\More.ru\public\img", request('image')->getClientOriginalName()); //помещаем его в папку с картинками
        $project->image = request('image')->getClientOriginalName();// хранить ли файл с оригинальным названием?
        $project->save(); //сохраняем объект
        //теперь нужно сделать создание файлов ( в отдельной таблице ряд записей)
        foreach (request('documents') as $doc) //перебираем массив файлов
        {
            $document = new \App\Document(); //создаем объект модели
            $document->id_project = $project->id;//создаем связь
            $document->name = $doc->getClientOriginalName(); //сохраняем название файла
            $doc->move(storage_path('Documents'), $doc->getClientOriginalName()); //сохраняем файл у себя на сервере
            $document->save(); //сохраняем строку таблицы
        }
        //dump(request()->all());
        
        return redirect ('/projects/working/new/1');
    }

    public function create()
    {
        //вызывает вьюшку для создания проекта
        return view('projects.create');
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


    /* public function show($id,$type)
    {
        //показывает вьюшку конкретного проекта
        $project = Project::find($id);
        //будет выведен проект либо с описанием в нижнем подразделе, либо спонсоры, либо комментарии
        return view('projects.show',['project' => $project,'type'=>$type]);
    }*/

}
