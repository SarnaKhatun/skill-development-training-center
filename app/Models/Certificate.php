<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}
