<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table ='products';
  protected $fillabel = ['name','price','intro','content','image','cate_id'];
  public $timestamp = false;

  public function cate(){
    return $this->belongsTo('App\Category');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }

  // public function pimages(){
  //   return $this->hasMany('App\ProductImage');
  // }

  public function danhgia(){
    return $this->hasMany('App\Danhgia');
  }
  // public function chitiethoadon(){
  //   return $this->hasMany('App\chitiethoadon');
  // }
}
