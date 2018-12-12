<?php

namespace App\Http\Requests;

use App\Company;
use App\Exam;
use App\Kwalificatiedossier;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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

    public function rules()
    {
        return [
            'voornaam' => 'required|string',
            'achternaam' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'telefoonnummer' => 'required|min:9',
            'straat' => 'required|string',
            'huisnummer' => 'required|numeric',
            'postcode' => 'required|min:6   ',
            'plaats' => 'required|string',
            'land' => 'required|string',
            'role_id' => 'required|numeric',
            'davinci_id' => 'required|min:3',
            'bedrijf' => 'nullable',
            'rol' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Het :attribute veld is verplicht',
            'voornaam.string' => 'Het :attribute veld moet text zijn',
            'achternaam.string' => 'Het :attribute veld moet text zijn',
            'straat.string' => 'Het :attribute veld moet text zijn',
            'plaats.string' => 'Het :attribute veld moet text zijn',
            'rol.string' => 'Het :attribute veld moet een string zijn',
            'land.string' => 'Het :attribute veld moet text zijn',
            'email.email' => 'Het :attribute veld moet een email zijn',
            'password.confirmed' => 'De wachtwoorden komen niet overeen',
            'huisnummer.numeric' => 'Het :attribute veld moet een getal zijn',
            'role_id.numeric' => 'Het :attribute veld moet een getal zijn',
            'email.min' => 'Het :attribute veld moet minimaal :min karakters zijn',
            'postcode.min' => 'Het :attribute veld moet minimaal :min karakters zijn',
            'davinci_id.min' => 'Het :attribute veld moet minimaal :min karakters zijn',
            'actief.in' => 'De switch voor :attirbute moet aan of uit staan',
        ];
    }

    public function persist()
    {
        $user = User::create([
            'voornaam' => request('voornaam'),
            'tussenvoegsel' => request('tussenvoegsel'),
            'achternaam' => request('achternaam'),
            'email' => request('email'),
            'password' => request('password'),
            'telefoonnummer' => request('telefoonnummer'),
            'straat' => request('straat'),
            'huisnummer' => request('huisnummer'),
            'toevoeging' => request('toevoeging'),
            'postcode' => request('postcode'),
            'plaats' => request('plaats'),
            'land' => request('land'),
            'active' => request('actief') == "on" ? 1 : 0,
            'role_id' => request('role_id'),
            'davinci_id' => request('davinci_id'),
        ]);
        if(in_array(request('role_id'), [4])){
            if(request('bedrijf'))
            {
                $user->companies()->attach([request('bedrijf') => ['bedrijfsrol'=> request('rol')]]);
            }
        }

        if(request('project')){
            if(in_array(request('role_id'), [3]))
            {
                $user->projects()->attach([request('project') => ['active'=> true, 'startdatum' => Carbon::now()]]);
            }
        }

        if(request('kwalificatiedossier') && request('role_id') == '3'){

            $user->kwalificatiedossier()->associate(request('kwalificatiedossier'))->save();
            foreach($user->kwalificatiedossier->proevevanbekwaamheids as $proevevanbekwaamheid){
                //koppel aan project
                $exam = Exam::create([
                    'proevevanbekwaamheid_id' => $proevevanbekwaamheid->id,
                    'user_id' => $user->id,
                ]);
                $user->exams()->save(($exam));
            }
        }
    }
}
