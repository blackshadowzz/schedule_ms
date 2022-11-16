<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function schedule(){
        return $this->hasMany(Schedule::class);
    }

    // public function setDays($value)
    // {

    //     $this->attributes['days'] = json_encode($value);

    // }

    // public function getDays($value)

    // {

    //     return $this->attributes['days'] = json_decode($value);

    // }
}
