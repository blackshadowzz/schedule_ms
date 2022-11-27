<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classtable extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function schedule_detail(){
        return $this->hasMany(Schedule_detail::class);
    }
    public function student(){
        return $this->belongsToMany(Student::class);
    }
}
