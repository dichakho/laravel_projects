<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tag extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];
    protected $table = 'tags';
    public function Articles(){
        return $this->belongsToMany('App\article', 'article_tag', 'tag_id', 'article_id');
    }
    
}
