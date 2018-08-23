<?php

namespace App\Http\Requests;

use App\period;
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
        return [
            'schooljaar' => 'required',
            'periodenaam' => 'required',
            'startdatum' => 'required',
            'einddatum' => 'required',
        ];
    }

    public function persist(){
        $period = Period::create([
            'schooljaar' => request('schooljaar'),
            'periodenaam' => request('periodenaam'),
            'startdatum' => Carbon::createFromFormat('d-m-Y', request('startdatum')),
            'einddatum' => Carbon::createFromFormat('d-m-Y', request('einddatum')),
        ]);
    }
}
