<?php

namespace App\Http\Requests;

use App\Company;
use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
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
            'naam' => 'required|string|unique:companies,naam',
            'straat' => 'required|string',
            'toevoeging' => 'nullable',
            'huisnummer' => 'required|numeric',
            'postcode' => 'required|min:6',
            'plaats' => 'required|string',
            'land' => 'required|string',
            'sector' => 'required|string',
            'website' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Het :attribute veld is verplicht',
            '*.string' => 'Het :attribute veld moet een text zijn',
            '*.numeric' => 'Het :attribute veld moet een nummer zijn',
            '*.min' => 'Het :attribute veld moet minimaal :min karakters lang zijn',
            'naam.unique' => 'Er bestaat al een bedrijf met deze naam   ',
        ];
    }

    public function persist(){
        Company::create([
            'naam' => request('naam'),
            'straat' => request('straat'),
            'huisnummer' => request('huisnummer'),
            'toevoeging' => request('toevoeging'),
            'postcode' => request('postcode'),
            'plaats' => request('plaats'),
            'land' => request('land'),
            'sector' => request('sector'),
            'website' => request('website'),
        ]);
    }
}
