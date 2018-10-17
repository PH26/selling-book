<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;



class CategoryController extends Controller
{
    public function getList()
    {
      $listCate = DB::table('categories')->select('id','name','prarent_id')->orderBy('id','DESC')->paginate(5);
      return view('backend.category.list',compact('listCate'));
    }

    public function getAdd()
    {
      $data = Category::select('id','name','prarent_id')->orderBy('id','DESC')->get();
      return view('backend.category.add',compact('data'));
    }

    public function postAdd(Request $request)
    {
       $this->validate($request,
       [
        	'name' => 'required|unique:categories,name'
       ],
       [
         'name.required' => 'Vui lòng nhập tên thể loại',
         'name.unique' => 'Tên thể loại đã tồn tại'

       ]);

      $category = new Category;
      $category->name = $request->name;
      $category->prarent_id = $request->prarent_id;
      $category->save();
      return redirect()->route('category.getAdd')->with('thongbao','Bạn đã thêm thành công');
    }

    public function getEdit($id)
    {
      $data = Category::find($id);
      $parent = Category::select('id','name','prarent_id')->get();
      return view('backend.category.edit',compact('parent','data'));
    }

     public function postEdit(Request $request,$id){
       $this->validate($request,
         ["name" => "required"],
         ["name.required" => "Tên danh mục không được bỏ trống"]
       );
       $category = Category::find($id);
       $category->name = $request->name;
       $category->prarent_id = $request->prarent_id;
       $category->save();
       return redirect()->route('category.getList')->with(['flash_level' => 'success','flash_message' => ' Bạn đã sữa danh mục thành công']);
     }

     public function getDelete($id){
   		$parent = Category::where('prarent_id',$id)->count();
   		if($parent == 0){
   			$cate = Category::find($id);
   			$cate->delete($id);
   			return redirect()->route('category.getList')->with(['flash_level' => 'success','flash_message' =>'Xóa danh mục thành công']);
   		}else{
   			return redirect()->route('category.getList')->with(['flash_level' => 'danger','flash_message' =>'Vui lòng xóa hết danh mục con trước']);
   		}
    }

}
