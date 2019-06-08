<?php

namespace App\Http\Controllers;

use App\tag;
use Illuminate\Http\Request;

class tagController extends Controller
{
    //
    public function getList(){
        $tag = tag::withTrashed()->paginate(10);
        // $tag = tag::all();
        return view('admin.tag.list', ['tag'=>$tag]);
    }
    public function getAdd(){
        $tag = tag::all();
        return view('admin.tag.add', ['tag'=>$tag]);
    }
    public function postAdd(Request $request){
        $this->validate($request, 
        [
            'name' => 'required|min:2',
            // 'article_id' => 'required',
        ], 
        [
            'name.required' => 'Bạn chưa nhập tên tag',
            // 'article_id.required' => 'Bạn chưa chọn danh mục',
        ]);
        $tag = new tag;
        $tag->name = $request->name;
        $tag->status = '1';
        $tag->save();
        return redirect('admin/tag/list')->with('notice', 'Add success');
    }
    public function getEdit($id){
        $tag = tag::find($id);
        return view('admin.tag.edit', ['tag'=>$tag]);
    }
    public function postEdit(Request $request, $id){
        $tag = tag::find($id);
        $this->validate($request, 
        [
            'name' => 'required|min:2',
            // 'article_id' => 'required',
        ], 
        [
            'name.required' => 'Bạn chưa nhập tên tag',
            // 'article_id.required' => 'Bạn chưa chọn danh mục',
        ]);
        $tag->name = $request->name;
        $tag->status = '1';
        $tag->save();
        return redirect('admin/tag/list')->with('notice', 'Edit success');
    }
    public function getDel($id){
        $tag = tag::find($id);
        $tag->delete();
        return back()->with('notice', 'Delete success');
    }
    public function getRestore($id){
        // var_dump($id); exit;
        tag::onlyTrashed()->where('id', $id)->restore();
        return back();
    }
    

}
