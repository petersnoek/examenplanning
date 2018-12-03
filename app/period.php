<?php

namespace App;


class period extends Model
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

    public function schoolyear(){
        return $this->belongsTo(Schoolyear::class);
    }

    public function slots(){
        return $this->hasMany(Slot::class);
    }
}
