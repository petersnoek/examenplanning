<?php

namespace App;

class Schoolyear extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'startdatum',
        'einddatum'
    ];
    public function periods(){
        return $this->hasMany(period::class);
    }
}
