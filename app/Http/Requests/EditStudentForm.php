<?php

namespace App\Http\Requests;

use App\Student;
use Illuminate\Foundation\Http\FormRequest;

class EditStudentForm extends FormRequest
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
            'email' => 'required|email',
            'adres' => 'required',
            'ovnummer' => 'required|numeric',
            'geslacht' => 'required',
        ];
    }
    public function patch(Student $student){
        $student = Student::find($student->id);
        $student->voornaam = request('voornaam');
        $student->tussenvoegsel = request('tussenvoegsel');
        $student->achternaam = request('achternaam');
        $student->email = request('email');
        $student->adres = request('adres');
        $student->ovnummer = request('ovnummer');
        $student->geslacht = request('geslacht');
//        $student->wachtwoord = request('wachtwoord');
        $student->save();
    }
}
