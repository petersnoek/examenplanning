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

        ];
    }

    public function persistWholePeriod($datum, $starttijd, $eindtijd, $period){
        $slot = Slot::create([
            'starttijd' => Carbon::parse($starttijd)->format('H:i'),
            'eindtijd' => Carbon::parse($eindtijd)->format('H:i'),
            'period_id' => $period->id,
            'datum' => Carbon::parse($datum),
        ]);
    }

    public function persistSubperiod(){
        $student = Student::create([
            'voornaam' => request('voornaam'),
        ]);
    }
}
