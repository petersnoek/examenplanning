<?php

namespace App;


class period extends Model
{
    public function Schoolyear(){
        $this->belongsTo(Schoolyear::class);
    }
}