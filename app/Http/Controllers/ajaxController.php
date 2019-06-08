<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class ajaxController extends Controller
{
    //
    public function getAjax($id){
        $category = category::where('parent_id', $id)->get();
        foreach($category as $cate){
          echo "<option value=".$cate->id.">".$cate->name."</option>";
        }
      }
}
