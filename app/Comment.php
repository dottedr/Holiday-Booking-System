<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment','author','status','request_id'
    ];
    public function holidayRequest(){
        return $this->belongsTo('App\HolidayRequest','author', "id");
    }
}
