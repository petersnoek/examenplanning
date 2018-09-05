<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    public function period(){
        $this->belongsTo(Period::class);
    }
}
