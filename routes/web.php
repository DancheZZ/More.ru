<?php
/*основные страницы пользователя
  /main основная страница
  /about про площадку
  /projects все проекты
  /projects/{id} один проект
  /create_project форма для создания проекта для зарегистрированного пользователя 
  /registration форма для регистрации 
  /enter форма для входа 
  /me личный кабинет 
  /question страница с возможностью задать вопрос
*/

Route::get('/about', function() 
{
  return view('about');
});

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/question', 'QuestionController@show');

Route::post('/question','QuestionController@store');

Route::get('/main', function()
{
  //return redirect('/main/all/1');
  $people = \App\User::count();
  $projects = \App\Project::count();
  $comments = \App\Comment::count();
  return view('main',['people' => $people, 'projects' => $projects, 'comments'=>$comments]);
});

Route::get('/main/{type}/{page}',                'ProjectController@mainShow'); //возвращает 3 проекта для главной страницы по каким-либо правилам

Route::get('/projects', function()
{
  return view('projects.list');
});

Route::get('/projects/{type}/{sorting}/{page}','ProjectController@listShow');// отображает страницу со всеми проектами

Route::get('/projects/create',                 'ProjectController@create'); //вызывает view для создания элемента

Route::post('/projects',                       'ProjectController@store'); //сохраняет новый проект

Route::get('/projects/{id}',                   'ProjectController@showSpecific');//показывает проект и описание к нему 


Route::get('/projects/{id}/{specific}',        'ProjectController@showSpecific');//в зависимости от значения specific проект отобразится вместе с комментариями или спонсорами

Route::get('/create', 'ProjectController@create');


Route::get('/polz', function()
{
  //Polzovatelskoe_soglashenie
  return response()->file("documents/Polzovatelskoe_soglashenie.pdf");
});


Route::get('/regulations',function()
{
  return response()->file("documents/Pravila_servisa.pdf");
});

Route::get('/politic',function()
{
  return response()->file("documents/Politika_konfidentsialnosti.pdf");
});
//аутентификация
Auth::routes();

Route::get('/chto', function()
{
  return view('chto');
});

Route::get('/FAQ', function()
{
  return view('FAQ');
});

Route::get('/contacts', function()
{
  return view('contacts');
});

Route::get('/how', function()
{
  return view('how');
});

//чтобы получить определенное кол-во записей из БД: NameTable::table(count)->get()
// paginate(count) - возвращает значительно больше информации
// all() - возвращает все
// latest(['pole']) - сортирует по убыванию, если дано поле - то по нему

// get - запрос для просмотра
// put - для обновления какого-то элемента
// delete - удаление элемента
//  будут вызваны соответствующие методы у контроллера для этого
// get /projects/2/edit - будет вызвана форма для редактирования
// с create так же самое

//пример возврата view и массива объектов:
    //$atricles = App\Article::latest()->get();
    //или $atricles = App\Article::take(count)->latest()->get();
    //return view('about',['articles' =>$articles]);
    //либо же передается 1 объект вместо массива и он выводится, как страница проекта


Route::get('/home', 'HomeController@index')->name('home');
