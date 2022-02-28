<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

//    $user = auth()->user()->id;
//    protected $redirectTo = '/links/';
//    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = RouteServiceProvider::LINKS;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showLoginForm()
    {
        return view('website.auth.register');
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
            'name' => ['required', 'string', 'max:30','unique:users', 'alpha_dash'],
            'userName' => ['required', 'string', 'max:30','unique:users', 'alpha_dash'],
//            'name' => ['required', 'string', 'max:30','unique:users', 'regex:/^\S*$/u'],
//            'name' => ['required', 'string', 'max:30','unique:users', 'alpha_dash'],
//            'name' => ['required', 'string', 'max:30','regex:/[a-z]/','regex:/[A-Z]/','regex:/[a-z]/','regex:/[0-9]/',
//            ],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
//    protected function create(Request $request)

    {

//        $user = new User();
//
//
//        $user->name = $request->get('name');
//        $user->email = $request->get('email');
//        $user->password = bcrypt($request->get('password'));
//
//        $user->save();
//
//        $this->guard()->login($user);
//
//        return $this->registered($request, $user)
//            ?: redirect()->intended(route('website'));
//
//        return redirect()->intended(route('website'));

        return User::create([
            'name' => $data['name'],
            'userName' => $data['userName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
