<?php

namespace App;

class Slot extends Model
{
    public function period(){
        return $this->belongsTo(period::class);
    }
}
