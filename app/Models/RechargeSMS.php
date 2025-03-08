<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RechargeSMS extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public function method(){
        return $this->belongsTo(PaymentMethod::class);
    }
    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}
