<?php

namespace App\Http\Requests;

use App\Company;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class EditCompanyRequest extends FormRequest
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
            'naam' => 'required|string',
            'straat' => 'required|string',
            'toevoeging' => 'nullable',
            'huisnummer' => 'required|numeric',
            'postcode' => 'required|min:6   ',
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
        ];
    }

    public function patch(Company $company){
        $company->naam = request('naam');
        $company->straat = request('straat');
        $company->huisnummer = request('huisnummer');
        $company->toevoeging = request('toevoeging');
        $company->plaats = request('plaats');
        $company->postcode = request('postcode');
        $company->land = request('land');
        $company->sector = request('sector');
        $company->website = request('website');
        $company->updated_at = Carbon::now();
        $company->update();
    }
}
