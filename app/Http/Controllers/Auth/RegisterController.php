<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/gestion/administrarUsuarios';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('admin');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'rut' => 'required|string|max:13|unique:users|cl_rut',
            'place_id' => 'required',
            'is_admin' =>'required',
            'labor' => 'required|string'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if($data['is_admin']==="si"){
            return User::create([
                'name' => $data['name'],
                'labor' => $data['labor'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'rut'=> $data['rut'],
                'is_admin' => true,
                'is_quality_attendant' => false,
                'place_id' =>$data['place_id'],


            ]);
        }
        else{
            return User::create([
                'name' => $data['name'],
                'labor' => $data['labor'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'rut'=> $data['rut'],
                'place_id' =>$data['place_id'],
                'is_admin' => false,
                'is_quality_attendant' => true,
            ]);
        }


    }
}
