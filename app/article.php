<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    //
    protected $table = 'articles';
    public function category(){
        return $this->belongsTo('App\category','category_id', 'id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'users_id', 'id');
    }
    public function tag(){
        return $this->belongsToMany('App\tag');
    }
}
