<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tourist_spot(){
        return $this->belongsTo(TouristSpot::class);
    }
}
