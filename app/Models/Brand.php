<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function statusInfo(){
        return $this->belongsTo('App\Models\Status', 'brand_status', 'id');
    }
    public function creatorInfo(){
        return $this->belongsTo('App\Models\User', 'brand_creator', 'id');
    }
    public function editorInfo(){
        return $this->belongsTo('App\Models\User', 'brand_editor', 'id');
    }
}
