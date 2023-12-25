<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compare extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ProductInfo(){
        return $this->belongsTo('App\Models\Product', 'product_id', 'product_id');
    }
    // public function UserInfo(){
    //     return $this->belongsTo('App\Models\User', 'user_id', 'user_id');
    // }
}
