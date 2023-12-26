<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory ;
    use SoftDeletes;
    protected $primaryKey = 'coupon_id';
    protected $guarded = [];

    public function creatorInfo(){
        return $this->belongsTo('App\Models\User', 'coupon_creator', 'user_id');
    }
    public function editorInfo(){
        return $this->belongsTo('App\Models\User', 'coupon_editor', 'user_id');
    }
}
