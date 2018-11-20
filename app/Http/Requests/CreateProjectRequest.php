<?php

namespace App\Http\Requests;

use App\Project;
use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'naam' => 'required|unique:projects,naam',
            'bedrijf' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'naam.unique' => 'Een projectnaam met deze naam bestaat al',
            '*.required' => 'Het :attribute veld is verplicht',
        ];
    }

    public function persist()
    {
        $project = Project::create([
            'naam' => request('naam'),
            'company_id' => request('bedrijf'),
        ]);
    }
}
