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

Route::get('/projects', 'ProjectController@index');

Route::get('projects/create','ProjectController@create');

Route::get('/projects/{id}', 'ProjectController@show');






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

