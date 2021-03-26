<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    //пример возврата view и массива объектов:
    //$atricles = App\Article::latest()->get();
    //или $atricles = App\Article::take(count)->latest()->get();
    //return view('about',['articles' =>$articles]);
    //либо же передается 1 объект вместо массива и он выводится, как страница проекта
});

//Route::get('/kraudfunding/{mail}', function($mail){
   // return "Это страница с проектами";
//});

Route::get('/kraudfunding/{mail}','Controller@show');
//вызов у контроллера метода show
//в представление попадет результат контроллера

//чтобы получить определенное кол-во записей из БД: NameTable::tabke(count)->get()
// paginate(count) - возвращает значительно больше информации
// all() - возвращает все
// latest(['pole']) - сортирует по убыванию, если дано поле - то по нему