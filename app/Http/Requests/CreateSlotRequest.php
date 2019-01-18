<?php

namespace App\Http\Requests;

use App\period;
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
        $period = request('period');
        return [
            'dagen' => 'required',
            'starttijd' => 'required',
            'eindtijd' => 'required|after:starttijd',

            'startdatum' => 'nullable|after_or_equal:' . $period->startdatum . ',before:' . $period->einddatum,
            'einddatum' => 'nullable|after_or_equal:startdatum|before_or_equal:' . $period->einddatum,

        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Het veld :attribute is verplicht',
            'eindtijd.after' => 'De eindtijd moet na de starttijd liggen',

            'startdatum.after_or_equal' => 'Het veld :attribute moet na de startdatum van de periode liggen',
            'startdatum.before' => 'Het veld :attribute moet voor de einddatum van de periode liggen',
            'einddatum.after_or_equal' => 'Het veld :attribute moet na de startdatum liggen',
            'einddatum.before_or_equal' => 'Het veld :attribute moet voor de einddatum van de periode liggen',

        ];
    }

    public function persist($period)
    {
        $persisted = false;
        $days = request('dagen');
        if (request('gehele_periode') == "on") {
            $checkdate = Carbon::parse($period->startdatum);
            $einddatum = Carbon::parse($period->einddatum);
        } else {
            $checkdate = Carbon::parse(request('startdatum'));
            $einddatum = Carbon::parse(request('einddatum'));
        }
        while ($checkdate <= $einddatum) {
            if (in_array($checkdate->dayOfWeek, $days)) {
                $slot = Slot::create([
                    'starttijd' => Carbon::parse(request('starttijd'))->format('H:i'),
                    'eindtijd' => Carbon::parse(request('eindtijd'))->format('H:i'),
                    'period_id' => $period->id,
                    'datum' => Carbon::parse($checkdate),
                ]);
                foreach(request('examinatoren') as $examinator){
                    $slot->users()->attach([$examinator => ['user_role' => 'Examinator']]);
                }
                $persisted = true;
            }
            $checkdate->addDay();
        }
        return $persisted;
    }
}
