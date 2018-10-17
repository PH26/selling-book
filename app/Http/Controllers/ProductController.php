<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\ProductImage;
use App\Danhgia;
use App\Http\Requests\ProductRequest;
use Input;
use File;
use DB,Auth;

class ProductController extends Controller
{
    public function getList()
    {
      $arrProduct = DB::table('products')->select('id','name','price','pricesale','image','cate_id','created_at','updated_at')->orderBy('id','DESC')->paginate(8);
      return view('backend.product.list',compact('arrProduct'));
    }

    public function getAdd()
    {
      $cate = Category::select('id','name','prarent_id')->get()->toArray();
      return view('backend.product.add',compact('cate'));
    }

    public function postAdd(Request $request)
    {
      $this->validate($request,
      [
        	'name' => 'required|unique:categories,name',
          'price'=>'required',
          'pricesale'=>'required',
        	'content' => 'required',
        	'intro' => 'required'
      ],
      [
        'name.required' => 'Vui lòng nhập tên sản phẩm',
        'name.unique' => 'Tên sản phẩm đã tồn tại',
        'price.required'=>'Vui lòng nhập giá cho sản phẩm',
        'pricesale.required'=>'Vui lòng nhập giá khuyến mãi cho sản phẩm',
        'content.required'=>'Vui lòng nhập nội dung cho sản phẩm',
        'intro.required'=>'Vui lòng nhập mô tả chi tiết cho sản phẩm',
      ]
       );
      $product = new Product;
      $product->name = $request->name;
      $product->price = $request->price;
      $product->pricesale = $request->pricesale;
      $product->intro = $request->intro;
      $product->content = $request->content;
      $product->cate_id = $request->category_id;
      if($request->hasFile('fileimages')){
        $file = $request->file('fileimages');
        $name = $file->getClientOriginalName();
        $image = str_random(4)."_".$name;
        while(file_exists('upload/'.$image)){
          $image = str_random(4)."_".$name;
        }
        $file->move('upload/',$image);
        $product->image = $image;
      }else{
        $product->image = "";
      }
      $product->save();
      $product_id = $product->id;
      if($request->hasFile('fileimageschitiet')){
        foreach ($request->file('fileimageschitiet') as $file) {
          $product_img = new ProductImage();
          if(isset($file)){
            $product_img->image = $file->getClientOriginalName();
            $product_img->product_id = $product_id;
            $file->move('upload/images_detail/',$file->getClientOriginalName());
            $product_img->save();
          }
        }
      }
     return redirect()->route('product.getAdd')->with(['thongbao' =>'Bạn đã thêm sản phẩm thành công']);
    }

    public function getEdit($id)
     {
    		$category = Category::select('id','name','prarent_id')->get()->toArray();
    		$product = Product::findOrFail($id);
    		$product_img = Product::findOrFail($id)->get()->toArray();
        	return view('backend.product.edit',compact('category','product','product_img'));
    	}

    public function postEdit(Request $request,$id)
    {
      $this->validate($request,
      [
          'name' => 'required',
          'price'=>'required',
          'pricesale'=>'required',
          'content' => 'required',
          'intro' => 'required'
      ],
      [
        'name.required' => 'Vui lòng nhập tên sản phẩm',
        'price.required'=>'Vui lòng nhập giá cho sản phẩm',
        'pricesale.required'=>'Vui lòng nhập giá khuyến mãi cho sản phẩm',
        'content.required'=>'Vui lòng nhập nội dung cho sản phẩm',
        'intro.required'=>'Vui lòng nhập mô tả chi tiết cho sản phẩm',
      ]
       );
        $product = Product::find($id);
        $img_current = 'upload/'.$request->img_current;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->intro = $request->intro;
        $product->content = $request->content;
        $product->cate_id = $request->category_id;
        if($request->hasFile('fileimages')){
          $file = $request->file('fileimages');
          $name = $file->getClientOriginalName();
          $image = str_random(4)."_".$name;
          while(file_exists('upload/'.$image)){
            $image = str_random(4)."_".$name;
          }
          $file->move('upload/',$image);
        	File::delete($img_current);
          $product->image = $image;
        }
     		$product->save();

        if(!empty($request->file('fileimageschitiet'))){
          foreach ($request->file('fileimageschitiet') as $file) {
            $product_img = new ProductImage();
            if(isset($file)){
              $product_img->image = $file->getClientOriginalName();
              $product_img->product_id = $id;
              $file->move('upload/images_detail/',$file->getClientOriginalName());
              $product_img->save();
            }
          }
        }
        return redirect()->route('product.getList')->with(['flash_level' => 'success','flash_message' =>'Sửa sản phẩm thành công']);
    }

     public function getDelete($id)
     {
       $product_detail = Product::find($id)->get()->toArray();
       foreach ($product_detail as $value) {
         File::delete('upload/images_detail/'.$value["image"]);
       }
       $product = Product::find($id);
       File::delete('upload/'.$product->image);
       $product->delete($id);
       return redirect()->route('product.getList')->with(['flash_level' => 'success','flash_message' =>'Xóa sản phẩm thành công']);
     }

     public function getDanhgia()
     {
   		$danhgia = DB::table('danhgias')
               ->join('products', 'danhgias.product_id', '=', 'products.id')
               ->select('danhgias.*','products.*')
               // ->groupBy('products.id','danhgias.product_id')
               ->paginate(8);
   		return view('backend.product.danhgia',compact('danhgia'));
   	}
}
