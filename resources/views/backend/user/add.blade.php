@extends('backend.master')
@section('controller','Danh mục')
@section('action','Thêm')
@section('danhmuc', 'active')
@section('them_dm', 'active')
@section('content')
<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
             <!-- @include ('backend.blocks.error') -->
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <!-- <h3 class="box-title">Quick Example</h3> -->
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" class="form-horizontal" method="post" action="{!!route('user.postAdd')!!}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                  <div class="box-body">

                      <div class="form-group">
                        <label  class="col-md-2" >Username </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="username"  placeholder="Nhập username  ..." value="{!! old('username') !!}">
                        </div>

                      </div>

                      <div class="form-group">
                        <label  class="col-md-2" >Mật khẩu</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="password"  placeholder="Nhập số ..." value="{!! old('password') !!}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label  class="col-md-2" >Email </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="email"  placeholder="Nhập email  ..." value="{!! old('email') !!}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label  class="col-md-2" >Tên </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="firstname"  placeholder="Nhập tên của bạn ..." value="{!! old('firstname') !!}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label  class="col-md-2" >Điện Thoại </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="phone"  placeholder="Nhập số  điện thoại ..." value="{!! old('phone') !!}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label  class="col-md-2" >Địa chỉ</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="address"  placeholder="Nhập địa chỉ của bạn ..." value="{!! old('address') !!}">
                        </div>
                      </div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Thêm User </button>
                    <button type="reset" class="btn btn-default">Làm lại</button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            <!-- right column -->
          </div>   <!-- /.row -->


        </section>

@stop
