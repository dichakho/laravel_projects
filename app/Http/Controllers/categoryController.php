<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    //
    public function getList (){
      $category = category::withTrashed()->paginate(10);
      // $category = category::where('id',13)->restore();                      
		  return view('admin.category.list', ['category'=>$category]);
    }
    public function getAdd(){
      $category = category::where('parent_id', '0')->get();
	    return view('admin.category.add', ['category'=>$category]);
    }
    public function postAdd(Request $request){
      // var_dump($request->all()); exit;
       $this->validate($request, 
       [
        'categoryName' => 'required|min:3|max:50',

       ], 
       [
        'categoryName.required' => 'Bạn chưa nhập Category Name',
        'categoryName.min' => 'Category Name phải có ít nhất 2 ký tự trở lên',
        'categoryName.max' => 'Category Name  nhiều nhất 100 ký tự'
       ]);
       $category = new category;
       $category->name = $request->categoryName;
       $category->parent_id = $request->child_id !=0 ? $request->child_id : $request->parent_id;
      //  var_dump($request->parentId); exit();
       $category->url_name = changeTitle($request->categoryName);
      //  echo $request->categoryName;
      $category->save();
      return redirect('admin/category/add')->with('notice', 'Add success');
    }
    public function getEdit($id){
      
      $category = category::find($id);
		  return view('admin.category.edit', ['category'=>$category]);
    }
    public function postEdit(Request $request, $id){
      $category = category::find($id);
      $this->validate($request, 
      [
        'categoryName' => 'required|unique:categories,name|min:3|max:50',
      ],
      [
        'categoryName.required' => 'Bạn chưa nhập Category Name',
        'categoryName.unique'=> 'Category Name đã tồn tại',
        'categoryName.min' => 'Category Name phải có ít nhất 2 ký tự trở lên',
        'categoryName.max' => 'Category Name  nhiều nhất 100 ký tự'
      ]);
      $category->name = $request->categoryName;
      $category->url_name = changeTitle($request->categoryName);
      $category->parent_id = 0;
      $category->save();
      return redirect('admin/category/edit/'.$id)->with('notice', 'Edit success');
    }
    public function getDel($id){
      $category = category::find($id);
      $category->delete();
      // category::where('id', $id)->delete();
      return back()->with('notice', "Delete success");
    }
    public function getRestore($id){
      category::onlyTrashed()->where('id', $id)->restore();
      return back();
    }
    
}
