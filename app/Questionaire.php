<?php

namespace App;

class Questionaire extends Model
{

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function projects(){
        return $this->belongsTo(Project::class);
    }
    public function remarks(){
        return $this->belongsToMany(Remark::class, 'remark_questionaire');
    }
}
