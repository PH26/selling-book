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
                <form role="form" class="form-horizontal" method="post" action="{!! route('category.getAdd')!!}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                  <div class="box-body">
                      <div class="form-group">
                        <label  class="col-md-2" >Loại danh mục</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name"  placeholder="Nhập tên danh mục ..." value="{!! old('name') !!}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-md-2" >Prarent_id</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="prarent_id"  placeholder="Nhập số ..." value="{!! old('prarent_id') !!}">
                        </div>
                      </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                    <button type="reset" class="btn btn-default">Làm lại</button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            <!-- right column -->
          </div>   <!-- /.row -->


        </section>

@stop
