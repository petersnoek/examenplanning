<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    public function exams(){
        return $this->belongsToMany(Exam::class);
    }
}
