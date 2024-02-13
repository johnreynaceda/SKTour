<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristSpot extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function municipality(){
        return $this->belongsTo(Municipality::class);
    }

    public function booking_transactions(){
        return $this->hasMany(BookingTransaction::class);
    }

    public function spots(){
        return $this->hasMany(Spot::class);
    }
}
