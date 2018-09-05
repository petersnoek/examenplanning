<?php

namespace App;

class Slot extends Model
{
    public function period(){
        $this->belongsTo(Period::class);
    }
}
