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
    protected $redirectTo = '/home';

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
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            //'user_type' => ['required', 'string', 'max:255'],
//            'cpf' => ['required', 'string', 'max:255'],
//            'endereco' => ['required', 'string', 'max:255'],
//            'contato' => ['required', 'string', 'max:255'],
//            'profissao' => ['required', 'string', 'max:255'],
//            'complemento' => ['required', 'string', 'max:255'],
//            'cep' => ['required', 'string', 'max:255'],
//            'municipio' => ['required', 'string', 'max:255'],
//            'estado' => ['required', 'string', 'max:255'],
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_type' => 'nautorizado',
           // 'password' => $data['password'],
            'cpf' => $data['cpf'],
            'endereco' => $data['endereco'],
            'contato' => $data['contato'],
            'profissao' => $data['profissao'],
            'complemento' => $data['complemento'],
            'cep' => $data['cep'],
            'municipio' => $data['municipio'],
            'estado' => $data['estado'],
        ]);
    }
}
