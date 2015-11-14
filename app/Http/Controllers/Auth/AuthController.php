<?php namespace Scholrs\Http\Controllers\Auth;

use Scholrs\User;
use Validator;
use Scholrs\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    protected $redirectTo = '/';
    protected $redirectAfterLogout = '/';

    use AuthenticatesAndRegistersUsers;


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'phone' => 'required',
            'dob' => 'required|date',
            'address' => 'required',
            'state' => 'required',
            'nationality' => 'required',
            'userId' => 'required|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
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
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'dob' => $data['dob'],
            'address' => $data['address'],
            'state' => $data['state'],
            'nationality' => $data['nationality'],
            'type' => $data['type'],
            'userId' => $data['userId'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'image' => $data['image'],
        ]);
    }
}
