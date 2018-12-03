<?php

namespace App\Http\Requests;

use App\Exam;
use App\Remark;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateExamRequest extends FormRequest
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
            'student' => 'required',
            'kwalificatiedossier' => 'required',
            'pvb' => 'required',
            'opmerking' => 'nullable|max:16383',

        ];
    }
    public function messages()
    {
        return [
            'student.required' => 'Het student veld is verplicht',
            'kwalificatiedossier.required' => 'Het kwalificatiedossier veld is verplicht',
            'pvb.required' => 'Het proeve van bekwaamheid veld is verplicht',
            'opmerking.max' => 'Het veld mag maximaal :max karakters lang zijn',
        ];
    }

    public function persist()
    {
        //find student project and insert into db
        $user = Auth::user();

        $exam = Exam::create([
            'proevevanbekwaamheid_id' => request('pvb'),
            'user_id' => $user->id,
        ]);
        $exam->user_id = (request('student')[0]);
        $exam->save();
        if(request('opmerking')){
            $remark = Remark::create([
                'body' => request('opmerking'),
                'user_id' => $user->id,
            ]);
            $remark->exams()->attach($exam->id);
        }
    }
}
