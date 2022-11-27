<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function schedule_detail(){
        return $this->hasMany(Schedule_detail::class);
    }
}
