<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'sub_category_id';

    public function statusInfo(){
        return $this->belongsTo('App\Models\Status', 'sub_category_status', 'id');
    }
    public function categoryInfo(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'category_id');
    }
    public function creatorInfo(){
        return $this->belongsTo('App\Models\User', 'sub_category_creator', 'user_id');
    }
    public function editorInfo(){
        return $this->belongsTo('App\Models\User', 'sub_category_editor', 'user_id');
    }
}
