<?php

namespace App;


class Proevevanbekwaamheid extends Model
{
    public function kwalificatiedossier(){
        return $this->belongsTo(Kwalificatiedossier::class);
    }

    public function exams(){
        return $this->hasMany(Exam::class);
    }
}
