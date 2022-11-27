<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function schedule_detail(){
        return $this->hasMany(Schedule_detail::class);
    }
}
