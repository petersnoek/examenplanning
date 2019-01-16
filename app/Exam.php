<?php

namespace App;

class Exam extends Model
{
    public function slot(){
        return $this->belongsTo(Slot::class, 'slot_id');
    }
    public function proevevanbekwaamheids(){
        return $this->belongsTo(Proevevanbekwaamheid::class, 'proevevanbekwaamheid_id');
    }
    public function remarks(){
        return $this->belongsToMany(Remark::class, 'exam_remark');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function project(){
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function invitees(){
        $duplicates = [];
        array_push($duplicates, $this->user);
        //check if exam has begeleider
        if($this->project->begeleider()){
            array_push($duplicates, $this->project->begeleider());
        }
        foreach($this->slot->users as $invitee)
        {
            array_push($duplicates, $invitee);
        }
        return array_unique($duplicates);
    }
}
