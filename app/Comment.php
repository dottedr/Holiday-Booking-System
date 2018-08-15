<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment','author','status','request_id'
    ];
    public function holidayRequest(){
        return $this->belongsTo('App\HolidayRequest','request_id', "id");
    }
    public function user(){
        return $this->belongsTo('App\User','author', "id");
    }
}
