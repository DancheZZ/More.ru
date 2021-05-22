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
Route::get('/', function()
{
  return redirect('/main');
});

Route::get('/about', function() 
{
  return view('about');
});


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


Route::get('/me','MeController@show');

//личный кабинект пользователя, смена данных
Route::post('/changeMe','MeController@changeMe');

Route::post('/changeAva','MeController@changeAva');

//админка
Route::get('admin/main', 'Admin@main');

//показ заявки на проект
Route::get('admin/request/{id}','Admin@request');

//показ формы для отказа проекта со вводом комментария администратора
Route::get('admin/response/{id}', function($id)
{
  return view('admin.response',['id' => $id]);
}
);

//сохранение проекта как отправленнного на доработку
Route::post('/admin/response/{id}', 'Admin@setResponse');

Route::get('/admin/deleteComment/{id}','Admin@deleteComment');

//принятие проекта
Route::get('/admin/accept/{id}', 'Admin@accept');
//конец админки



Route::post('/comment/add/{id_project}', 'CommentController@store');

Route::get('/grade/{project_id}/{opinion}', 'GradeController@setGrade');

Route::get('/main/{type}/{page}',                'ProjectController@mainShow'); //возвращает 3 проекта для главной страницы по каким-либо правилам

Route::get('/projects/create',                 'ProjectController@create'); //вызывает view для создания элемента

Route::get('/projects/{id}',                   'ProjectController@showSpecific');//показывает проект и описание к нему 

Route::get('/projects', function()
{
  return view('projects.list');
});

Route::get('/projects/{type}/{sorting}/{page}','ProjectController@listShow');// отображает страницу со всеми проектами



Route::post('/projects',                       'ProjectController@store'); //сохраняет новый проект




//Route::get('/projects/{id}/{specific}',        'ProjectController@showSpecific');//в зависимости от значения specific проект отобразится вместе с комментариями или спонсорами

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/setLang/{language}', function($language)
{
  App::setLocale($language);
  return redirect('/main');
});
