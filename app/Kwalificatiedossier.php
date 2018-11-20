<?php

namespace App;

class Kwalificatiedossier extends Model
{
    public function proevevanbekwaamheids(){
        return $this->hasMany(Proevevanbekwaamheid::class);
    }

    public function users(){
        return $this->hasMany(User::class, 'kwalificatiedossier_id');
    }

}
