<?php

namespace App\Http\Requests;

use App\Exam;
use App\Slot;
use Illuminate\Foundation\Http\FormRequest;

class PlanSlotRequest extends FormRequest
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

    public function plan(Slot $slot){
        $slot->users()->detach();
        //detaching the exams
        foreach($slot->exams as $exam){
            $exam->slot_id = null;
            $exam->save();
        }

        if(request('examens')){
            foreach(request('examens') as $examId){
                $exam = Exam::find((Int)$examId);
                $slot->exams()->save($exam);
            }
        }
        else{
            foreach($slot->exams as $exam){
                $exam->slot_id = null;
                $exam->save();
            }
        }

        if(request('examinatoren'))
        {
            $count =0;
            foreach(request('examinatoren') as $examinatorId){
                $slot->users()->attach([$examinatorId => ['user_role'=>'Examinator']]);
            }
        }
        else{
            $slot->examinators()->detach();
        }
        $slot->save();
    }
}
