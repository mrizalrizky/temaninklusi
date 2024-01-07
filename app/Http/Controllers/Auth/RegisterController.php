<?php

namespace App\Http\Controllers\Auth;

use App\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Models\MasterOrganizer;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'min: 5', 'max:20', 'unique:users'],
            'user_type' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'email:dns'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['same:password'],
        ];

        if($data['user_type'] == RoleConstant::EVENT_ORGANIZER) {
            $rules['organizer_name'] = 'required|string|min:3';
            $rules['organizer_address'] = 'required|string|min:3';
            $rules['organizer_contact_name'] = 'required|string|min:3';
            $rules['organizer_contact_phone'] = 'required';
            $rules['organizer_contact_email'] = 'required|email|unique:master_organizers,contact_email|email:dns';
        }

        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'role_id' => $data['user_type'],
            'password' => Hash::make($data['password']),
        ]);
        if($data['user_type'] == RoleConstant::EVENT_ORGANIZER) {
            MasterOrganizer::create([
                'initial' => array_reduce(explode(' ', $data['name']), function ($initials, $word) {
                    return sprintf('%s%s', $initials, substr($word, 0, 1));
                }, ''),
                'user_id' => $user->id,
                'name' => $data['organizer_name'],
                'address' => $data['organizer_address'],
                'contact_name' => $data['organizer_contact_name'],
                'contact_email' => $data['organizer_contact_email'],
                'contact_phone' => $data['organizer_contact_phone'],
            ]);
        };

        return $user;
    }
}
