<?php

namespace App\Http\Requests;

use App\Kwalificatiedossier;
use Illuminate\Foundation\Http\FormRequest;

class EditKwalificatiedossierRequest extends FormRequest
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
            'crebonr' => 'required|numeric',
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
            'vanaf_cohort.required' => 'Het veld :attribute is verplicht',

        ];
    }

    public function patch(Kwalificatiedossier $kwalificatiedossier){
        $kwalificatiedossier->releasedatum = request('releasedatum');
        $kwalificatiedossier->crebo = request('crebonr');
        $kwalificatiedossier->vanaf_cohort = request('vanaf_cohort');
        $kwalificatiedossier->update();
    }
}
