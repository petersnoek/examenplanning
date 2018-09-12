<?php

namespace App\Http\Requests;

use App\Exam;
use Illuminate\Foundation\Http\FormRequest;

class CreateExamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function persist()
    {

        Exam::create([
            'student_id' => request('student'),
            'proeve_van_bekwaamheid' => request('pvb'),
            'kerntaak' => request('kerntaken'),
        ]);
    }
}
