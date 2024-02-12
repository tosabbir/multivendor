<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function division(){
        return $this->belongsTo(Division::class, 'division_id', 'division_id');
    }

    public function district(){
        return $this->belongsTo(District::class, 'district_id', 'district_id');
    }

    public function police_station(){
        return $this->belongsTo(PoliceStation::class, 'police_station_id', 'police_station_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
