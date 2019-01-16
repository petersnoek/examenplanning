<?php

namespace App\Http\Requests;

use App\Project;
use Illuminate\Foundation\Http\FormRequest;

class EditProjectRequest extends FormRequest
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
            'naam' => 'required',
            'bedrijf' => 'required',
        ];
    }
    public function messages()
    {
        return [
            '*.required' => 'Het :attribute veld is verplicht',
        ];
    }

    public function patch()
    {
        $project = request('project');
        $project->naam = request('naam');
        $project->company_id = request('bedrijf');

        $project->user()->sync([request('begeleider') => ['begeleider' => true, 'active' => true]]);

        $project->update();
    }
}
