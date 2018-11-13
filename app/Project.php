<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{   
    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function user(){
        return $this->belongsToMany(User::class, 'project_user');
    }
    public function questionaires(){
        return $this->belongsTo(Questionaire::class);
    }
    public function exams(){
        return $this->belongsToMany(Exam::class);
    }
}
