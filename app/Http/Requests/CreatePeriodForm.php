<?php

namespace App\Http\Requests;

use App\period;
use App\Schoolyear;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CreatePeriodForm extends FormRequest
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
        $schoolyear = Schoolyear::find(request('schooljaar'));
        return [
            'schooljaar' => 'required',
            'periodenaam' => 'required|unique:periods,periodenaam,NULL,id,schoolyear_id,' . $schoolyear->id,
            'startdatum' => 'required|after:'. $schoolyear->startdatum . '|before:'. $schoolyear->einddatum,
            'einddatum' => 'required|after:startdatum',
        ];
    }

    public function messages()
    {
        return [
            'schooljaar.required' => 'Het schooljaarveld is verplicht',
            'periodenaam.required' => 'Het periodenaamveld is verplicht',
            'periodenaam.unique' => 'Een periode met deze naam bestaat al voor dit schooljaar',
            'startdatum.required' => 'Het startdatumveld is verplicht',
            'einddatum.required' => 'Het einddatumveld is verplicht',
            'einddatum.after' => 'De einddatum moet na de startdatum liggen',
            'startdatum.before' => 'De startdatum moet voor de einddatum van het schooljaar liggen',
            'startdatum.after' => 'De startdatum moet na de startdatum van het schooljaar liggen',
        ];
    }

    public function persist()
    {
        $period = period::create([
            'schoolyear_id' => request('schooljaar'),
            'periodenaam' => request('periodenaam'),
            'startdatum' => Carbon::createFromFormat('Y-m-d', request('startdatum')),
            'einddatum' => Carbon::createFromFormat('Y-m-d', request('einddatum')),
        ]);
    }
}
