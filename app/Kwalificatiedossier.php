<?php

namespace App;

class Kwalificatiedossier extends Model
{
    public function proevevanbekwaamheids(){
        return $this->hasMany(Proevevanbekwaamheid::class);
    }
}
