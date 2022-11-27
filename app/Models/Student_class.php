<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_class extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function classtable(){
        return $this->belongsTo(Classtable::class);
    }
}
