<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Guard;
// use Illuminate\Contracts\Auth\Registrar;
// use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
// use App\Http\Requests\LoginRequest;
// use App\Http\Requests\RegisterReqeust;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Routing\Route;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
      $listUsers = DB::table('users')->select('id','username','password','email','firstname','phone','address')->orderBy('id','DESC')->paginate(10);
      return view('backend.user.list',compact('listUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdd()
    {
          return view('backend.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAdd(Request $request)
    {
      $users = new User;
      $users->username = $request->username ;
      $users->password =Hash::make($request->password);
      $users->email= $request->email ;
      $users->firstname  = $request->firstname ;
      $users->phone = $request->phone ;
      $users->address = $request->address;
      $users->remember_token = $request->_token;
      $users->save();
     return redirect()->route('user.getList');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
      $data = User::find($id);
      return view('backend.user.edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function postEdit(Request $request,$id)
    {
      $users = User::find($id);
      $users->username = $request->username ;
      $users->password = Hash::make($request->password);
      $users->email= $request->email;
      $users->firstname  = $request->firstname ;
      $users->phone = $request->phone;
      $users->address = $request->address;
      $users->remember_token = $request->_token;
      $users->save();
     return redirect()->route('user.getList');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function getDelete($id)
    {
      $product = User::find($id);
      $product->delete($id);
      return redirect()->route('user.getList');
    }
  
}
