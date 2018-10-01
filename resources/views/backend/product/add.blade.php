@extends('backend.master')
@section('controller','Sản phẩm')
@section('action','Thêm')
@section('sanpham','active')
@section('them_sp', 'active')
@section('content')
<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
             @include ('backend.blocks.error')
              <!-- general form elements -->
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                  <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="col-md-2">Thể Loại</label>
                        <div class="col-md-10">
                            <select class="form-control" name="prarent_id">
                              <?php foreach ($cate as  $value): ?>
                                  <option><?php echo $value ['prarent_id'] ?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-md-2">Tên sản phẩm</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name"  placeholder="Tên sản phẩm..." value="{!! old('txtten') !!}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-md-2">Giá</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="price" placeholder="Giá sản phẩm..." value="{!! old('txtgia') !!}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="" class="col-md-2">Giá khuyến mại</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="pricesale" placeholder="Giá khuyến mại..." value="{!! old('txtgiasale') !!}">
                        </div>
                      </div>
                     <div class="form-group">
                        <label for="" class="col-md-2">Mô tả sản phẩm</label>
                        <div class="col-md-10">
                            <textarea class="form-control focus-form" name="intro" id="txtndhienthi"> {!! old('txtndchitiet') !!} </textarea>
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="" class="col-md-2">Mô tả chi tiết </label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="content" id="txtndchitiet"> {!! old('txtndchitiet') !!} </textarea>

                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-md-2">Hình ảnh</label>
                        <div class="col-md-10">
                            <input type="file" name="image">
                        </div>
                      </div>


                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                    <button type="reset" class="btn btn-default">Làm lại</button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->


            <!-- right column -->
          </div>   <!-- /.row -->


        </section>

@stop
