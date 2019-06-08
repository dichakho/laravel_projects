<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class category extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];
    protected $table = 'categories';
    public function article(){
        return $this->hasMany('App\article', 'category_id', 'id');
    }
    public function children(){
        return $this->hasMany('App\category', 'parent_id');
    }
    public function parent(){
        return $this->belongsTo('App\category','parent_id');
    }
    // public function news(){
    //     return $this->hasManyThrough('App\Comment', App\Post);
    // }

}
