<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchBallance extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function method(){
        return $this->belongsTo(PaymentMethod::class);
    }
    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}
