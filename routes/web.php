<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
// Route::get('/', function () {
//     return view('backend.master');
// });

   Route::get('/', [
     'as' =>'index',
     'uses' => 'PageController@index']);




Route::get('/admin/login',[
  'as'=> 'admin.getLogin',
  'uses'=>'AuthController@getLogin']);
Route::post('/admin/login',[
  'as'=> 'admin.postLogin',
  'uses'=>'AuthController@postLogin']);
Route::get('/admin/logout',[
  'as'=>'admin.logout',
  'uses'=>'AuthController@logout']);





// Route::group(['prefix' =>'admin','middleware'=>'adminLogin'],function(){
Route::group(['prefix' => 'category'],function(){
    Route::get('add',[
      'as' => 'category.getAdd',
      'uses' => 'CategoryController@getAdd']);
    Route::post('add',[
      'as' => 'category.postAdd',
      'uses' => 'CategoryController@postAdd']);
    Route::get('list',[
      'as' => 'category.getList',
      'uses' => 'CategoryController@getList']);
    Route::get('delete/{id}',[
      'as' => 'category.getDelete',
      'uses' => 'CategoryController@getDelete']);
    Route::get('edit/{id}',[
      'as' => 'category.getEdit ',
      'uses' => 'CategoryController@getEdit']);
    Route::post('edit/{id}',[
      'as' => 'category.postEdit',
      'uses' => 'CategoryController@postEdit']);
  });

Route::group(['prefix' => 'user'],function(){
    Route::get('add',[
      'as' => 'user.getAdd',
      'uses' => 'UsersController@getAdd']);
    Route::post('add',[
      'as' => 'user.postAdd',
      'uses' => 'UsersController@postAdd']);
    Route::get('list',[
      'as' => 'user.getList',
      'uses' => 'UsersController@getList']);
    Route::get('delete/{id}',[
      'as' => 'user.getDelete',
      'uses' => 'UsersController@getDelete']);
    Route::get('edit/{id}',[
      'as' => 'user.getEdit ',
      'uses' => 'UsersController@getEdit']);
    Route::post('edit/{id}',[
      'as' => 'user.postEdit',
      'uses' => 'UsersController@postEdit']);
  });

  Route::group(['prefix' => 'product'],function(){
    Route::get('add',[
      'as' => 'product.getAdd',
      'uses' => 'ProductController@getAdd']);
    Route::post('add',[
      'as' => 'product.postAdd',
      'uses' => 'ProductController@postAdd']);
    Route::get('list',[
      'as' => 'product.getList',
      'uses' => 'ProductController@getList']);
    Route::get('delete/{id}',[
      'as' => 'product.getDelete',
      'uses' => 'ProductController@getDelete']);
    Route::get('edit/{id}',[
      'as' => 'product.getEdit',
      'uses' => 'ProductController@getEdit']);
    Route::post('edit/{id}',[
      'as' => 'product.postEdit',
      'uses' => 'ProductController@postEdit']);



    Route::get('delimg/{id}',[
      'as' => 'admin.product.getDelImg',
      'uses' => 'ProductContoller@getDelImg']);




    Route::get('listdanhgia',[
      'as' => 'product.listDanhgia',
      'uses' => 'ProductController@getDanhgia']);
  });
  Route::group(['prefix' => 'tintuc'],function(){
    // Route::get('add',['as' => 'tintuc.getAdd','uses' => 'TintucController@getAdd']);
    // Route::post('add',['as' => 'tintuc.postAdd','uses' => 'TintucController@postAdd']);
    Route::get('list',[
      'as' =>'tintuc.getList',
      'uses' => 'TintucController@getList']);
    // Route::get('delete/{id}',['as' =>'tintuc.getDelete','uses' => 'TintucController@delete']);
    // Route::get('edit/{id}',['as' =>'tintuc.getEdit','uses' => 'TintucController@getEdit']);
    // Route::post('edit/{id}',['as' =>'tintuc.getEdit','uses' => 'TintucController@postEdit']);
  });
  // Route::group(['prefix' => 'cart'],function(){
  //   Route::get('list',['as' => 'cart.getCart','uses' => 'CartController@listcart']);
  //   Route::get('delete/{id}',['as' => 'cart.getDelete','uses' => 'CartController@delete']);
  //   Route::get('update/{id}',['as' => 'cart.getCapnhat','uses' => 'CartController@update']);
  // });
// });


Route::get('san-pham',[
  'as' => 'sanpham',
  'uses' => 'PageController@category']);

Route::get('dang-ky',['as' => 'dangky','uses' => 'PageController@getDangky']);
Route::post('dang-ky',['as' => 'dangky','uses' => 'PageController@postDangky']);
Route::get('gio-hang',[
  'as' => 'giohang',
  'uses' => 'PageController@giohang']);
Route::get('addtocart/{id}',[
  'as' => 'themvaogio',
  'uses' => 'PageController@addtocart']);
Route::get('huy-gio-hang',['as' => 'huygiohang','uses' => 'PageController@huygiohang']);
Route::get('xoa-cart/{id}',['as' => 'xoacart','uses' => 'PageController@xoacart']);
Route::get('update-cart/{id}/{qty}',['as' => 'updatecart','uses' => 'PageController@updatecart']);
Route::get('thanh-toan',['as' => 'thanhtoan','uses' =>'PageController@thanhtoan']);
Route::post('thanh-toan',['as' => 'thanhtoan','uses' =>'PageController@postthanhtoan']);
Route::get('danh-gia',[
  'as' => 'danhgia',
  'uses' =>'PageController@danhgia']);
Route::get('lien-he',[
  'as' => 'lienhe',
  'uses' =>'PageController@lienhe']);
Route::post('lien-he',[
  'as' => 'lienhe',
  'uses' =>'PageController@postlienhe']);

Route::get('{id}',[
  'as' => 'chitietsanpham',
  'uses' => 'PageController@chitietsanpham']);
Route::get('danh-muc/{id}',[
  'as' => 'cateparent',
  'uses' => 'PageController@cateparent']);
Route::any('{all?}','PageController@index')->where('all','(.*)');
