<?php

namespace App\Http\Requests;

use App\Exam;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'voornaam' => 'required|string',
            'achternaam' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            'password' => 'confirmed',
            'telefoonnummer' => 'required|min:9',
            'straat' => 'required|string',
            'huisnummer' => 'required|numeric',
            'postcode' => 'required|min:6',
            'plaats' => 'required|string',
            'land' => 'required|string',
            'role_id' => 'required|numeric',
            'davinci_id' => 'required|min:3',
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

    public function patch()
    {
        $user = request('user');
        $user->voornaam = request('voornaam');
        $user->tussenvoegsel = request('tussenvoegsel');
        $user->achternaam = request('achternaam');
        $user->email = request('email');
        $user->password = request('password');
        $user->telefoonnummer = request('telefoonnummer');
        $user->straat = request('straat');
        $user->huisnummer = request('huisnummer');
        $user->toevoeging = request('toevoeging');
        $user->postcode = request('postcode');
        $user->plaats = request('plaats');
        $user->land = request('land');
        $user->active = request('actief') == "on" ? 1 : 0 ;
        $user->role_id = request('role_id');
        $user->davinci_id = request('davinci_id');
        $user->update();

//        dd('hallo',$user->kwalificatiedossier);

        if(request('bedrijf')){
            if(in_array(request('role_id'), [3,4]))
            {
                $user->companies()->detach();
//                dd(!in_Array(request('bedrijf'), $user->companies->pluck('id')->toArray()));
                if(in_Array(request('bedrijf'), $user->companies->pluck('id')->toArray()))
                {
                    $user->companies()->updateExistingPivot(request('bedrijf'), ['bedrijfsrol'=> request('role_id') == 4 ?  request('rol') : 'Stagiair']);
                }
                else{
                    $user->companies()->attach([request('bedrijf') => ['bedrijfsrol'=> request('role_id') == 4 ?  request('rol') : 'Stagiair']]);
                }
            }
        }
        else{
            $user->companies()->detach();
        }

        if(request('kwalificatiedossier') && request('role_id') == '3'){
            if(request('kwalificatiedossier') != ($user->kwalificatiedossier ? $user->kwalificatiedossier->id : null))
            {
                $user->kwalificatiedossier()->dissociate()->save();
                $user->kwalificatiedossier()->associate(request('kwalificatiedossier'))->save();
//                $user->update();
                $user = User::find($user->id);

                $user->exams()->delete();

                foreach($user->kwalificatiedossier->proevevanbekwaamheids as $proevevanbekwaamheid){
                    $exam = Exam::create([
                        'proevevanbekwaamheid_id' => $proevevanbekwaamheid->id,
                        'user_id' => $user->id,
                    ]);
                    $user->exams()->save($exam);
                }
            }
        }
        if(request('role_id') != '3'){
            $user->kwalificatiedossier()->dissociate()->save();
            $user->exams()->delete();
        }

    }
}
