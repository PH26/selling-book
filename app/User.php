<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{



    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const CUSTOMER_TYPE = 0;
    const ADMIN_TYPE = 1;
    
  protected $table ='users';
  protected $fillabel = ['username','password','email','firstname','phone','address'];
  public $timestamp = false;
}

 ?>
