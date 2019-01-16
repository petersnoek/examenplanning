<?php

namespace App\Http\Requests;

use App\Exam;
use App\Mail\PlannedExam;
use App\Mail\Welcome;
use App\Slot;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

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

        if(request('examinatoren'))
        {
            foreach(request('examinatoren') as $examinatorId){
                $slot->users()->attach([$examinatorId => ['user_role'=>'Examinator']]);
            }
        }

        if(request('examens')){
            //attaching the selected exams only
            foreach(request('examens') as $examId){
                $exam = Exam::find((Int)$examId);
                $slot->exams()->save($exam);
            }
        }

        $slot->save();

        //send mail to all examinators
        foreach($slot->users as $user){
            Mail::to($user)->send(new PlannedExam(URL::route('personalAgenda'), $slot->fresh(), $user));
        }
        //send mail to student & bedrijfsbegeleider

    }
}
