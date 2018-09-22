<?php

namespace App;

class Exam extends Model
{
    public function slots(){
        return $this->belongsTo(Slot::class);
    }
    public function proevevanbekwaamheids(){
        return $this->belongsTo(Proevevanbekwaamheid::class);
    }
}
