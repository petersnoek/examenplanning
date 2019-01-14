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

        if(request('examens')){
            //detaching the exams
            foreach($slot->exams as $exam){
                $exam->slot_id = null;
                $exam->save();
            }

            //attaching the selected exams only
            foreach(request('examens') as $examId){
                $exam = Exam::find((Int)$examId);
//                $exam->slot()->associate($slot)->save();
                $slot->exams()->save($exam);
            }
        }
        else{
            //detaching all exams
            foreach($slot->exams as $exam){
                $exam->slot_id = null;
                $exam->save();
            }
        }

        if(request('examinatoren'))
        {
            foreach(request('examinatoren') as $examinatorId){
                $slot->users()->attach([$examinatorId => ['user_role'=>'Examinator']]);
            }
        }
        else{
            $slot->examinators()->detach();
        }


        $slot->save();

        //send mail to all examinators
        foreach($slot->users as $user){
            Mail::to($user)->queue(new PlannedExam(URL::route('personalAgenda'), $slot->fresh(), $user));
        }
        //send mail to student
    }
}
