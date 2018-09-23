<?php

namespace App;

class Exam extends Model
{
    public $table = 'exams';
    public function slots(){
        return $this->belongsTo(Slot::class);
    }
    public function proevevanbekwaamheids(){
        return $this->belongsTo(Proevevanbekwaamheid::class);
    }
    public function remarks(){
        return $this->belongsToMany(Remark::class);
    }
    public function users(){
        return $this->belongsToMany(User::class, 'exam_user');
    }
}
