<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function time(){
        return $this->belongsTo(Time::class);
    }
    public function semester(){
        return $this->belongsTo(Semester::class);
    }
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}
