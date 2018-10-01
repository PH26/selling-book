<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
      $listCate = DB::table('categories')->select('id','name','prarent_id')->orderBy('id','DESC')->paginate(10);
      return view('backend.category.list',compact('listCate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdd()
    {
      $data = Category::select('id','name','prarent_id')->orderBy('id','DESC')->get();
      return view('backend.category.add',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAdd(Request $request)
    {
      $category = new Category;
      $category->name = $request->name;
      $category->prarent_id = $request->prarent_id;
      $category->save();
      return redirect()->route('category.getList');
    }

    public function getEdit($id)
    {
      $data = Category::find($id);
      $parent = Category::select('id','name','prarent_id')->get();
      return view('backend.category.edit',compact('parent','data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
     public function postEdit(Request $request,$id)
     {
       $category = Category::find($id);
       $category->name = $request->name;
       $category->prarent_id = $request->prarent_id;
       $category->save();
       return redirect()->route('category.getList');
     }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */

    public function getDelete($id)
    {
      $cate = Category::find($id);
      $cate->delete($id);
      return redirect()->route('category.getList');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $categories)
    {
        //
    }
}
