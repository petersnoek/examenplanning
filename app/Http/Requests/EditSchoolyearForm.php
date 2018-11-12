<?php

namespace App\Http\Requests;

use App\Schoolyear;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class EditSchoolyearForm extends FormRequest
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
            'startdatum' => 'required',
            'einddatum' => 'required|after:startdatum',
        ];
    }

    public function messages()
    {
        return [
            'einddatum.after' => 'De einddatum moet na de begindatum liggen',
        ];
    }

    public function patch(Schoolyear $schoolyear)
    {
        $schoolyear = Schoolyear::find($schoolyear->id);
        $schoolyear->schooljaar = request('schooljaar');
        $schoolyear->startdatum = Carbon::parse(request('startdatum'));
        $schoolyear->einddatum = Carbon::parse(request('einddatum'));
        $schoolyear->save();
    }
}
