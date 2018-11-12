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
    public function rules(Schoolyear $schoolyear)
    {
        return [
            'schooljaar' => 'required',
            'periodenaam' => 'required',
            'startdatum' => 'required|before:einddatum',
            'einddatum' => 'required|after:'.Carbon::parse($schoolyear->startdatum),
        ];
    }
    public function messages()
    {
        return [
            'schooljaar.required' => 'Het schooljaarveld is verplicht',
            'periodenaam.required' => 'Het periodenaamveld is verplicht',
            'startdatum.required' => 'Het startdatumveld is verplicht',
            'einddatum.required' => 'Het einddatumveld is verplicht',
            'einddatum.after' => 'De einddatum moet na de begindatum van het schooljaar liggen',
            'startdatum.before' => 'De startdatum moet voor de einddatum liggen',
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
