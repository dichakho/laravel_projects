<?php

namespace App\Http\Controllers;

use App\article;
use App\category;
use Illuminate\Http\Request;

class pageController extends Controller
{
    //
    public function getViewHomePage(){
        $category = category::where('parent_id', '0')->get();
        $article = article::all();
        // $cate = category::all();
        // var_dump($category[0]->children[0]->children[0]->parent); exit;
        // $a = $article[9]->tag->all();
        // foreach($a as $b){

        //     var_dump($b->name);
        //     echo "<br>";
        //     echo "<br>";
        //     echo "<br>";
        //     echo "<br>";
            
        // }
        // exit;
        // var_dump($article[9]->tag->all()); exit;
        // foreach($category as $cat){
        //     echo $cat;
        //     echo '<br>';
        // }
        // foreach($category as $ca){
        //     echo $ca->children;
        //     echo '<br>';
        // }
        // foreach($category[0]->children as $cate){
        //     echo $cate->children;
        //     echo '<br>';
        // }
        // exit;
        return view('client.pages.homepage', ['category' => $category], ['article' => $article] );
    }
    public function getNews($url){
        // var_dump($url); exit;
        $category = category::where('parent_id', '0')->get();
        $article = article::where('url_name', $url)->get();
        $post = article::all();
        // var_dump($article[0]->tag); exit;
        
        // var_dump($relativeNews); exit;
        return view('client.pages.post',['article' => $article, 'category' => $category, 'post' => $post]);
    }
    public function getNewsbyCate($url){
        $category = category::where('parent_id', '0')->get();
        $cate = category::where('url_name', $url)->get();
        // var_dump($cate[0]->children[0]->id); exit;
        $article = article::where('category_id', $cate[0]->id)->where('category_id', $cate[0]->children->id)->get();
        var_dump($article[0]->title); exit;
        return view('client.pages.postbycate', ['category' => $category]);
    }
    
}
