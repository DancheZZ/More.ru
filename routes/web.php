<?php
/*основные страницы пользователя

  /about про площадку
  /projects все проекты
  /projects/{id} один проект
  /create_project форма для создания проекта для зарегистрированного пользователя 
  /registration форма для регистрации 
  /enter форма для входа 
  /me личный кабинет 
*/

Route::get('/about', function() 
{
  return view('about');
});

Route::get('/', function () {
    return view('welcome');
    //пример возврата view и массива объектов:
    //$atricles = App\Article::latest()->get();
    //или $atricles = App\Article::take(count)->latest()->get();
    //return view('about',['articles' =>$articles]);
    //либо же передается 1 объект вместо массива и он выводится, как страница проекта
});

Route::get('/projects',              'ProjectController@index');//страница со всеми проектами, 
                                                                //добавится еще постраничный вывод и сортировка каким-то образом

Route::get('/projects/create',       'ProjectController@create'); //вызывает view для создания элемента

Route::post('/projects',             'ProjectController@store'); //сохраняет новый проект

Route::get('/projects/{id}',         'ProjectController@showWithDescription');//показывает проект и описание к нему 

Route::get('/projects/{id}/{specific}');
//Route::get('/projects/{id}/comments','ProjectController@showWithComments');//показывает проект и комментарии к нему


//Route::get('/projects/{id}/sponsors','ProjectController@showWithSponsors');//показывает проект и его спонсоров






//Route::get('/kraudfunding/{mail}', function($mail){
   // return "Это страница с проектами";
//});

//Route::get('/kraudfunding/{mail}','Controller@show');
//вызов у контроллера метода show
//в представление попадет результат контроллера


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

