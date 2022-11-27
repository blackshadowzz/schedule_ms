<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function building(){
        return $this->belongsTo(Building::class);
    }
    public function classtable(){
        return $this->hasMany(Classtable::class);
    }
    public function schedule_detail(){
        return $this->hasMany(Schedule_detail::class);
    }
}
