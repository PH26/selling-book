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
                <form role="form" class="form-horizontal" method="post" action="{!!route('user.postEdit',$data->id)!!}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                  <div class="box-body">

                      <div class="form-group">
                        <label  class="col-md-2" >Username </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="username"  value="{{$data->username}}">
                        </div>

                      </div>

                      <div class="form-group">
                        <label  class="col-md-2" >Mật khẩu</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="password"   value="{{$data->password}}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label  class="col-md-2" >Email </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="email"   value="{{$data->email}}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label  class="col-md-2" >Tên </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="firstname"  value="{{$data->firstname}}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label  class="col-md-2" >Điện Thoại </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="phone"   value="{{$data->phone}}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label  class="col-md-2" >Địa chỉ</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="address"  value="{{$data->address}}">
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
