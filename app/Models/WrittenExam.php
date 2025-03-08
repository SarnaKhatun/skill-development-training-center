<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WrittenExam extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function added_by()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    public function batch(){
        return $this->belongsTo(Batch::class, 'batch_id', 'id');
    }

    public function questions()
    {
        return $this->hasMany(WrittenQuestion::class, 'written_exam_id', 'id');
    }

    public function marks()
    {
        return $this->hasMany(WrittenExamMark::class, 'exam_id', 'id');
    }
}
