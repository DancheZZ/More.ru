<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use App\Author;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show($mail)
    {
        //$result = DB::table('author')->where('mail',$mail)->first(); //из таблицы author достается 1 значение с полем mail равным $mail
        $result = Author::where('mail',$mail)->first(); //класс Author через такой метод where ссылается АВТОМАТИЧЕСКИ на таблицу с именем authors!
        //result - это объект!!
        return($result->mail);
        //чтобы вернуть вью с какими то параметрами, нужно написать
        //return view('name', ['post' = $post]);
    }
}
