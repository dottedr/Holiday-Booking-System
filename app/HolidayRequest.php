<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HolidayRequest extends Model
{
    protected $fillable = [
        'start','end','type','status', 'created_by'
    ];
    public function user()
    {
        return $this->belongsTo('App\User', "created_by", "id");
    }
    public function comment()
    {
        return $this->hasMany('App\Comment', 'author','id');
    }
}
