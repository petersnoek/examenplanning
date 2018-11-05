<?php

namespace App\Http\Requests;

use App\Slot;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CreateSlotRequest extends FormRequest
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
            'starttijd' => 'required',
            'eindtijd' => 'required|unique:periods,periodenaam,NULL,id,schoolyear_id,' . $schoolyear->id,
            'datum' => 'required|after:startdatum',
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

    public function persist($datum, $starttijd, $eindtijd, $period){
        $slot = Slot::create([
            'starttijd' => Carbon::parse($starttijd)->format('H:i'),
            'eindtijd' => Carbon::parse($eindtijd)->format('H:i'),
            'period_id' => $period->id,
            'datum' => Carbon::parse($datum),
        ]);
    }
}
