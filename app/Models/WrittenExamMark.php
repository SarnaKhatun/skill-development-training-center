<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WrittenExamMark extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function writtenExam()
    {
        return $this->belongsTo(WrittenExam::class, 'exam_id', 'id');
    }

}
