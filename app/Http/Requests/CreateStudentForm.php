<?php

namespace App\Http\Requests;

use App\Mail\WelcomeStudent;
use App\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Mail;

class CreateStudentForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'voornaam' => 'required',
            'achternaam' => 'required',
            'email' => 'required|email|unique:students,email',
            'adres' => 'required',
            'ovnummer' => 'required|numeric|unique:students,ovnummer',
            'geslacht' => 'required',
        ];
    }

    public function persist(){
        //create random password that the student has to reset later on
//        $password = bcrypt(str_random(8));
        $student = Student::create([
            'voornaam' => request('voornaam'),
            'tussenvoegsel' => request('tussenvoegsel'),
            'achternaam' => request('achternaam'),
            'email' => request('email'),
            'adres' => request('adres'),
            'ovnummer' => request('ovnummer'),
            'geslacht' => request('geslacht'),
//            'password' => $password,
        ]);
        //send link for the student to reset his password.
        Mail::to($student)->send(new WelcomeStudent($student));
    }
}
