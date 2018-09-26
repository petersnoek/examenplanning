<?php

namespace App;

class Remark extends Model
{
    public function exams(){
        return $this->belongsToMany(Exam::class, 'exam_remark');
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function questionaires(){
        return $this->belongsToMany(Questionaire::class, 'remark_questionaire');
    }
}
