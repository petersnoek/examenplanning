<?php

namespace App;

class Status extends Model
{
    public function exams(){
        return $this->belongsToMany(Exam::class);
    }
}
