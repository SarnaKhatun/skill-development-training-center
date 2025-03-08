<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubmitAnswer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function mcqExam()
    {
        return $this->belongsTo(McqExam::class, 'mcq_exam_id');
    }
}
