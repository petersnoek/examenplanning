<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;

class Model extends Revisionable
{
    protected $guarded = [];
    protected $revisionCreationsEnabled = true;

    protected $revisionNullString = 'niets';
    protected $revisionUnknownString = 'onbekend';

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
