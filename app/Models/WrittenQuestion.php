<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WrittenQuestion extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function ques_body()
    {
        return $this->belongsTo(WrittenExam::class, 'written_exam_id', 'id');
    }
}
