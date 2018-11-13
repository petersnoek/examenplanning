<?php

namespace App;

use Venturecraft\Revisionable\Revisionable;

class Model extends Revisionable
{
    protected $guarded = [];
    protected $revisionCreationsEnabled = true;

    protected $revisionNullString = 'niets';
    protected $revisionUnknownString = 'onbekend';
}
