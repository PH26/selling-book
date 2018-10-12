@extends('backend.master')
@section('controller','Danh mục')
@section('action','Danh sách')
@section('danhmuc', 'active')
@section('list_dm', 'active')
@section('content')
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <table class="table table-bordered table-hover">

                    <thead>
                      <tr align="center">
                        <th style="width:6%" align="center">Username </th>
                        <th scope="col">Mật khẩu</th>
                        <th scope="col"> Email </th>
                        <th scope="col">Tên</th>
                        <th scope="col"> Điện Thoại</th>
                        <th scope="col"> Địa chỉ</th>
                        <td scope="col"> Thao Tác </td>
                      </tr>
                    </thead>

                    <tbody>

                    @foreach($listUsers as $user)
                      <tr>
                        <td align="center">{!! $user->username !!}</td>
                        <td >{!! $user->password!!}</td>
                        <td >{!! $user->email !!}</td>
                        <td >{!! $user->firstname !!}</td>
                        <td >{!! $user->phone!!}</td>
                        <td >{!! $user->address!!}</td>
                        <td align="center">
                          <a href="{!! url ('user/edit',$user->id) !!}" class="btn btn-success"><i> Sửa</i></a>
                          <a href="{!!url ('user/delete',$user->id)!!}" class="btn btn-success"><i ></i>Xóa</a>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>


                  <div class="pull-right">

                  </div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section>

@stop
