<?php

namespace App\Http\Controllers\Auth;

use App\Mail\Welcome;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
            'voornaam' => 'required|string|max:26',
            'tussenvoegsel' => 'nullable|string|max:10',
            'achternaam' => 'required|string|max:26',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'telefoonnummer' => 'required|string|min:9',
            'straat' => 'required|string|min:2',
            'huisnummer' => 'required|numeric|min:1',
            'toevoeging' => 'nullable|string|min:1',
            'postcode' => 'required|string|min:6',
            'land' => 'required|string|min:2',
            'plaats' => 'required|string|min:2',
            'davinci_id' => 'required|string|min:3',
            'role_id' => 'required|in:1,2,3,4,5',
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
//        dd($data);
        $user = User::create([
            'voornaam' => $data['voornaam'],
            'tussenvoegsel' => $data['tussenvoegsel'],
            'achternaam' => $data['achternaam'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'telefoonnummer' => $data['telefoonnummer'],
            'straat' => $data['straat'],
            'huisnummer' => $data['huisnummer'],
            'toevoeging' => $data['toevoeging'],
            'postcode' => $data['postcode'],
            'land' => $data['land'],
            'davinci_id' => $data['davinci_id'],
            'plaats' => $data['plaats'],
            'role_id' => $data['role_id'],
        ]);
        Mail::to($user)->send(new Welcome($user));
        session()->flash('message', 'Account succesvol aangemaakt');
        return $user;
    }
}
