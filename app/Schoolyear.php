<?php

namespace App;

class Schoolyear extends Model
{
    public function periods(){
        return $this->hasMany(period::class);
    }
}
