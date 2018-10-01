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

Route::get('/', function () {
    return view('backend.master');
});
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
    Route::get('listdanhgia',[
      'as' => 'product.listDanhgia',
      'uses' => 'ProductController@getDanhgia']);
  });
