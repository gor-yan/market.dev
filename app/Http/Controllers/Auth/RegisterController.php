<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
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
     * Redirect Depends on Role
    */
    protected function redirectTo()
    {
        if (Auth::user()->role == 'freelancer') {
            return '/freelancer';
        } elseif (Auth::user()->role == 'client') {
            return '/client';
        }
    }
    
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function registerAs($as = false)
    {
        if (in_array($as, ['freelancer', 'client'])) {
            return view('auth.registerForm')->with(['as' => $as]);
        } else {
            return view('auth.registerAs');
        }
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
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'country' => 'required|string',
            'city' => 'required|string',
            'address1' => 'required|string',
            'address2' => 'nullable|string',
            'phone' => 'required',
            'role' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'userIdentity' => uniqid('user_'),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'country' => $data['country'],
            'country_iso' => $data['country_iso'],
            'city' => $data['city'],
            'address1' => $data['address1'],
            'address2' => $data['address2'],
            'phone' => $data['phone'],
            'role' => $data['role'],
            'account_status' => 'empty',
        ]);
    }
}


















