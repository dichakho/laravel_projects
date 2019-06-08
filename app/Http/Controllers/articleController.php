<?php

namespace App\Http\Controllers;

use App\User;
use App\category;
use App\article;
use App\tag;
use Illuminate\Http\Request;

class articleController extends Controller
{
    //
    public function getList (){
        $article = article::paginate(10);
        return view('admin.article.list', ['article'=>$article]);
    }
    public function getAdd(){
        $category = category::where('parent_id', 0)->get();
        $tag = tag::all();
        return view('admin.article.add', ['category'=>$category], ['tag'=>$tag]);
    }
    public function postAdd(Request $request){
        
        // echo date('YmdHis'); exit;
        // var_dump($request->grandParentCate); exit();
        $this->validate($request, 
        [
            'title' => 'required',
            'content' => 'required',
            'grandParentCate'=> 'required',
            'author' => 'required', 
        ], 
        [
            'title.required' => 'Bạn chưa nhập tiêu đề',
            'content.required' => 'Bạn chưa nhập nội dung',
            'category.required' => 'Bạn chưa nhập thể loại',
            'author.required' => 'Bạn chưa nhập tác giả',
        ]);
        $article = new article;
        $article->title = $request->title;
        $url = changeTitle($request->title);
        $time = date('YmdHis');
        $article->url_name = $url.$time;
        // var_dump($article->url_name); exit;
        $article->content = $request->content;
        $article->description = $request->description;
        if ($request->childCate === '0') {
            $article->category_id = $request->parentCate !== '0' ? $request->parentCate : $request->grandParentCate;
        } else {
            $article->category_id = $request->childCate;
        }
        $article->users_id = $request->author;
        // var_dump($request->tag); exit;
        $article->image = $request->img;
        $article->view = '0';
        $article->save();
        $article->tag()->sync($request->tag, false);
        return redirect('admin/article/list');
    }
    public function getEdit($id){
        $category = category::where('parent_id', 0)->get();
        $tag = tag::all();
        $article = article::find($id);
        return view('admin.article.edit', ['article'=>$article, 'category'=>$category, 'tag'=>$tag]);
    }
    public function postEdit(Request $request, $id){
        $article = article::find($id);
        $this->validate($request, 
        [
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
        ], 
        [
            'title.required' => 'Bạn chưa nhập tiêu đề',
            'content.required' => 'Bạn chưa nhập nội dung',
            'category.required' => 'Bạn chưa nhập thể loại',
            'author.required' => 'Bạn chưa nhập tác giả',
        ]);
        $article->title = $request->title;
        $url = changeTitle($request->title);
        $time = date('YmdHis');
        $article->url_name = $url.$time;
        // var_dump($article->url_name); exit;
        $article->content = $request->content;
        $article->description = $request->description;
        if ($request->childCate === '0') {
            $article->category_id = $request->parentCate !== '0' ? $request->parentCate : $request->grandParentCate;
        } else {
            $article->category_id = $request->childCate;
        }
        $article->users_id = $request->author;
        // var_dump($request->tag); exit;
        $article->image = $request->img;
        $article->view = '0';
        $article->save();
        $tag = $request->input('tag', []);
        $article->tag()->sync($tag, true);
        return redirect('admin/article/list');
    }
}
