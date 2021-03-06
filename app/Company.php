<?php

namespace App;

class Company extends Model
{
    public function users(){
        return $this->belongsToMany(User::class, 'company_user');
    }
    public function projects(){
        return $this->hasMany(Project::class, 'company_id');
    }
    public function stagiairs(){

    }
    public function medewerkers(){

    }
    public function begeleiders(){
        return $this->users()->where('bedrijfsrol', '!=' , 'stagiair');
    }
}
