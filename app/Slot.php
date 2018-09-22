<?php

namespace App;

class Slot extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'datum',
    ];

    public function getWeeknumberAttribute()
    {
        return $this->datum->format('W');
    }

    public function getDaynumberAttribute()
    {
        return $this->datum->format('N');
    }

    public function period(){
        return $this->belongsTo(period::class);
    }
    public function exams(){
        return $this->hasMany(Exam::class);
    }
}
