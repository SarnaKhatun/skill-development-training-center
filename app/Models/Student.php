<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function batch(){
        return $this->belongsTo(Batch::class);
    }
    public function result()
    {
        return $this->hasOne(Result::class, 'student_id', 'id');
    }
    public function exam(){
        return $this->belongsTo(Examination::class);
    }
    public function board(){
        return $this->belongsTo(Board::class);
    }
    public function session(){
        return $this->belongsTo(Session::class);
    }
    public function branch(){
        return $this->belongsTo(Branch::class,'created_by');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
