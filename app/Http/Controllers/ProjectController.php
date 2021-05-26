<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProjectController extends Controller
{
    //метод для вывода проектов на главной странице постранично ($page) согласно какому-то типу ($type)
    //возможные значения для type: all(все),popular(популярные),new(новые),soon(скоро).
    public function mainShow($type,$page)
    {
        $projects = null;
        $authors = Array();
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
        
        $firstAuth = $projects[0]['id_user'];
        $secondAuth = $projects[1]['id_user'];
        $threeAuth = $projects[2]['id_user'];
        $authors[0] = \App\User::where
        (
            [
                ['id',$firstAuth]
            ]
        )->get();

        $authors[1] = \App\User::where
        (
            [
                ['id',$secondAuth]
            ]
        )->get();

        $authors[2] = \App\User::where
        (
            [
                ['id',$threeAuth]
            ]
        )->get();
        return ['projects'=> $projects, 'authors' => $authors];
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
        $countPages = 0;
        $authors = Array();

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
                    ->orderBy($field,$forward)->skip(6*$page-6)->limit(6)->get();
                //находим возможное количество страниц
                $countPages = Project::where
                ([
                    ['published',1],
                    ['completed',0] 
                ])->count();
                break;
            case 'completed':
                $projects = Project::where
                ([
                    ['published',1],
                    ['completed',1] 
                ])
                    ->orderBy($field,$forward)->skip(6*$page-6)->limit(6)->get();
                $countPages = Project::where
                ([
                    ['published',1],
                    ['completed',1] 
                ])->count();
                break;
            case 'record':
                $projects = Project::where
                ([
                    ['published',1]
                ])
                ->orderBy('collected_money','desc')->orderBy($field,$forward)->skip(6*$page-6)->limit(6)->get();
                $countPages = Project::where
                ([
                    ['published',1]
                ])->count();
                break;
        }

        for ($i = 0; $i<count($projects); $i++)
        {
            $authors[] = \App\User::where
            (
                [
                    ['id',$projects[$i]['id_user']]
                ]
            )->get();
        }
        
        $resultcountPages = floor($countPages / 6);
        if ($countPages % 6 > 0 )
        $resultcountPages++;
        return ['projects'=> $projects, 'authors' => $authors, 'countPages' => $resultcountPages];
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
        $descripton = $project->description;
        $comments = \App\comment::where('id_project','=',$id)->get();
        //поиск айди пользователей, которые поддержали проект
        $users_id = \App\donate::select('id_user')->where('id_project','=',$id)->get();
        //поиск пользователей спонсоров
        $sponsors = \App\User::whereIn('id',$users_id)->get();
        //расчет дней до окончания проекта
        $countDays = floor((  strtotime($project->final_date) - strtotime(date("y.m.d")) )/ (60*60*24));
        //автор проекта
        $author = \App\User::where('id',$project->id_user)->get();
        //процент заполнения проекта
        $procent = floor(($project->collected_money / $project->money_required) * 100) ;
        //комментаторы
        // найдем все айди пользователей, которые прокомментировали
        $id_commentators = \App\comment::select('id_user')->where('id_project','=',$id)->get();
        //теперь всех пользователей
        $commentators = \App\User::whereIn('id',$id_commentators)->get();
        //ищем спонсоров
        //смотрим оценил ли пользователь этот проект
        if (strtotime($project->final_date) <= strtotime(date("y.m.d")))
        {
            $project->completed = true;
            $project->save();
        }
        $Grade= null;
        if (Auth::user())
        $Grade = \App\grade::where
        (
            [
                ['id_user',Auth::user()->id],
                ['id_project',$project->id] 
            ]
        )->get();
        else 
        {
            
        }
        if (count($Grade) == 0) $Grade = null;                                                                                                                                                 ;
        return view('projects.show',
        [
            'project'=>$project,
            'description'=>$descripton,
            'comments'=>$comments,
            'sponsors'=>$sponsors, 
            'author'=>$author,
            'countDays'=> $countDays,
            'procent' => $procent,
            'commentators' =>$commentators,
            'grade' => $Grade
        ]);

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
        $project->id_user = Auth::user()->id;
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
        
        return redirect ('/projects');
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


}
