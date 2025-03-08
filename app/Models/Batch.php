<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function written_exams()
    {
        return $this->hasMany(WrittenExam::class, 'batch_id', 'id');
    }
    public function mcq_exams()
    {
        return $this->hasMany(McqExam::class, 'batch_id', 'id');
    }
}
