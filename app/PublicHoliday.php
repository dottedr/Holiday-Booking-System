<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicHoliday extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name','date','duration'
    ];

}
