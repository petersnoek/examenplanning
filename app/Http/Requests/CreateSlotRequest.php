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
        return [
            'starttijd' => 'required',
            'eindtijd' => 'required',
//            'datum' => 'required',
        ];
    }

    public function messages()
    {
        return [
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
            if (in_array($checkdate->dayOfWeek,$days)) {
                for ($aantal = 0; $aantal < request('aantal'); $aantal++) {
                    Slot::create([
                        'starttijd' => Carbon::parse(request('starttijd'))->format('H:i'),
                        'eindtijd' => Carbon::parse(request('eindtijd'))->format('H:i'),
                        'period_id' => $period->id,
                        'datum' => Carbon::parse($checkdate),
                    ]);
                    $persisted = true;
                }
            }
            $checkdate->addDay();
        }
        return $persisted;
    }
}
