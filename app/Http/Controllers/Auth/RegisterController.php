<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
 
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/main'; //изменить

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:2', 'confirmed'],
            'surname' =>['required','string','max:255'],
            'phone' => ['required','string','max:10']
        ]);
    }
    /*Фамилию
    Фамилию
    Имя
    Почту
    Возраст
    Пароль*/

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $image = request('avatar'); //получаем объект файла
        $image->move(storage_path('Images'), request('avatar')->getClientOriginalName()); //помещаем его в папку с картинками
         // хранить ли файл с оригинальным названием?
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'surname' => $data['surname'],
            'phone' => $data['phone'],
            'is_admin' => 0,
            'date_registration' => Carbon::today(),
            'age' => floor((strtotime(Carbon::today()) - strtotime($data['date']) )/ (60*60*24*365)),
            'avatar' => request('avatar')->getClientOriginalName()
            ]);
    }
}
