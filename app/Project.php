<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function companies(){
        return $this->belongsTo(Company::class);
    }
    public function user(){
        return $this->belongsToMany(User::class, 'project_user');
    }
    public function questionaires(){
        return $this->hasOne(Questionaire::class);
    }
    public function exams(){
        return $this->belongsToMany(Exam::class);
    }
}
