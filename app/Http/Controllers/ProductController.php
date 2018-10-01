<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
// use App\Product;
use App\ProductImage;
use App\Danhgia;
use App\Http\Requests\ProductRequest;
use Input,File;
// use Request;
use DB,Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
      $arrProduct = DB::table('products')->select('id','name','price','pricesale','image','cate_id','created_at','updated_at')->orderBy('id','DESC')->paginate(8);
      return view('backend.product.list',compact('arrProduct'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdd()
    {
      $cate = Category::select('id','name','prarent_id')->get()->toArray();
      return view('backend.product.add',compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAdd(Request $request)
    {
      $product = new Product;
      $product->name = $request->name;
      $product->price = $request->price;
      $product->pricesale = $request->pricesale;
      $product->intro = $request->intro;
      $product->content = $request->content;
      $product->image = $request->image;
      $product->cate_id = $request->prarent_id;
      $product->save();
     return redirect()->route('product.getList');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $data = Product::find($id);
        $cate = Category::select('id','name','prarent_id')->get();
        return view('backend.product.edit',compact('data','cate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function postEdit(Request $request,$id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->intro = $request->intro;
        $product->content = $request->content;
        $product->image = $request->image;
        $product->cate_id = $request->prarent_id;
        $product->save();
        return redirect()->route('product.getList');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function getDelete($id)
    {
      $product = Product::find($id);
      $product->delete($id);
      return redirect()->route('product.getList');
    }

    public function getDanhgia(){
  		$danhgia = DB::table('danhgias')
              ->join('products', 'danhgias.product_id', '=', 'products.id')
              ->select('danhgias.*','products.*')
              // ->groupBy('products.id','danhgias.product_id')
              ->paginate(8);
  		return view('backend.product.danhgia',compact('danhgia'));
  	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
