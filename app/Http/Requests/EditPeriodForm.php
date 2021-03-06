<?php

namespace App\Http\Requests;

use App\period;
use App\Schoolyear;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class EditPeriodForm extends FormRequest
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
            'periodenaam' => 'required',
            'startdatum' => 'required|after:'.Carbon::parse($schoolyear->startdatum).'|before:'. $schoolyear->einddatum,
            'einddatum' => 'required|after:startdatum',
        ];
    }
    public function messages()
    {
        return [
            'schooljaar.required' => 'Het schooljaarveld is verplicht',
            'periodenaam.required' => 'Het periodenaamveld is verplicht',
            'startdatum.required' => 'Het startdatumveld is verplicht',
            'einddatum.required' => 'Het einddatumveld is verplicht',
            'einddatum.after' => 'De einddatum moet na de startdatum liggen',
            'startdatum.before' => 'De startdatum moet voor de einddatum van het schooljaar liggen',
            'startdatum.after' => 'De startdatum moet na na de startdatum van het schooljaar liggen',
        ];
    }

    public function patch(Period $period, Schoolyear $schoolyear){
        $period = Period::find($period->id);
        $period->schoolyear_id = request('schooljaar');
        $period->startdatum = Carbon::parse(request('startdatum'));
        $period->einddatum = Carbon::parse(request('einddatum'));
        $period->periodenaam = request('periodenaam');
        $period->update();
    }
}
