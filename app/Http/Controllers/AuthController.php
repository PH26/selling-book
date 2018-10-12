<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

     public function getLogin()
     {
       return view('admin.login');
     }

     public function postLogin(Request $request)
     {
       if(Auth::attempt(['email'=> $request->email,'password'=> $request->password]))
       {
        return redirect()->route('category.getAdd');
       }else{
          return redirect()->route('admin.getLogin');
       }
     }


      public function logout()
      {
          Auth::logout();
          return redirect()->route('admin.getLogin');
       }
}
