<?php

namespace App\Http\Requests;

use App\Kwalificatiedossier;
use Illuminate\Foundation\Http\FormRequest;

class CreateKwalificatiedossierRequest extends FormRequest
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
            'releasedatum' => 'required|date',
            'crebonr' => 'required|numeric|unique:kwalificatiedossiers,crebo',
            'vanaf_cohort' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'releasedatum.required' => 'Het veld :attribute is verplicht',
            'releasedatum.date' => 'Het veld :attribute moet een datum zijn',
            'crebonr.required' => 'Het veld :attribute is verplicht',
            'crebonr.numeric' => 'Het veld :attribute moet een nummer zijn',
            'crebonr.unique' => 'Er bestaat al een crebo met dit nummer',
            'vanaf_cohort.required' => 'Het veld :attribute is verplicht',

        ];
    }

    public function persist(){
        Kwalificatiedossier::create([
            'releasedatum' => request('releasedatum'),
            'crebo' => request('crebonr'),
            'vanaf_cohort' => request('vanaf_cohort'),
        ]);
    }
}
