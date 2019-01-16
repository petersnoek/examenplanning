<?php

namespace App\Http\Requests;

use App\Schoolyear;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateSchoolyearForm extends FormRequest
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
            'schooljaar' => 'required|unique:schoolyears,schooljaar',
            'startdatum' => 'required',
            'einddatum' => 'required|after:startdatum',
        ];
    }
    public function messages()
    {
        return [
            'schooljaar.unique' => 'Een schooljaar met deze naam bestaat al',
            'einddatum.after' => 'De einddatum moet na de begindatum liggen',
        ];
    }

    public function persist()
    {
        Schoolyear::create([
            'schooljaar' => request('schooljaar'),
            'startdatum' => Carbon::createFromFormat('d-m-Y', request('startdatum')),
            'einddatum' => Carbon::createFromFormat('d-m-Y', request('einddatum')),
        ]);
    }
}
