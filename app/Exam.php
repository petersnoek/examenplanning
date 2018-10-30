<?php

namespace App;

class Exam extends Model
{
    public function slots(){
        return $this->belongsTo(Slot::class, 'slot_id');
    }
    public function proevevanbekwaamheids(){
        return $this->belongsTo(Proevevanbekwaamheid::class, 'proevevanbekwaamheid_id');
    }
    public function remarks(){
        return $this->belongsToMany(Remark::class, 'exam_remark');
    }
    public function users(){
        return $this->belongsToMany(User::class, 'exam_user')->withPivot('user_role');
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function examinators(){
        return $this->users()->where('user_role', 'Examinator');
    }
    public function student(){
        return $this->users()->where('user_role', 'Student');
    }
    public function project(){
        return $this->belongsTo(Project::class, 'project_id');
    }
}
