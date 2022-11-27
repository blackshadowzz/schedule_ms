<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule_detail extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function classtable(){
        return $this->belongsTo(Classtable::class);
    }
    public function room(){
        return $this->belongsTo(Room::class);
    }
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function semester(){
        return $this->belongsTo(Semester::class);
    }
}
