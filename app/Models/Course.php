<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function courseSubject(){
        return $this->hasMany(CourseSubject::class,'course_id','id');
    }

    public function written_exam()
    {
        return $this->hasMany(WrittenExam::class, 'course_id', 'id');
    }
}
