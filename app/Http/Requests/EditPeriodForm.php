<?php

namespace App\Http\Requests;

use App\period;
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
        return [
            'schooljaar' => 'required',
            'periodenaam' => 'required',
            'startdatum' => 'required',
            'einddatum' => 'required',
        ];
    }

    public function patch(Period $period){
        $period = Period::find($period->id);
        $period->schooljaar = request('schooljaar');
        $period->startdatum = Carbon::parse(request('startdatum'));
        $period->einddatum = Carbon::parse(request('einddatum'));
        $period->periodenaam = request('periodenaam');
        $period->save();
    }
}
