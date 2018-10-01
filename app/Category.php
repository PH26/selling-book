<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table ='categories';
  protected $fillabel = ['name','prarent_id'];
  public $timestamps = true;

}
