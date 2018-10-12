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
                      <tr>
                        <th>Tên Danh Mục </th>
                        <th>Loại danh mục</th>
                        <th>Thao Tác</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach($listCate as $cates)
                      <tr>
                        <td align="center">{!! $cates->name!!}</td>
                        <td >
                          @if($cates->prarent_id == 0)
                          {!! "--" !!}
                          @else
                          <?php
                              $pdata = DB::table('categories')->where('id',$cates->prarent_id)->first();
                             echo @$pdata->name;
                          ?>
                          @endif
                        </td>
                        <td align="center">
                          <a href="{!! url('category/edit',$cates->id) !!}" class="btn btn-success"><i> Sửa</i></a>
                          <a href="{!! url('category/delete',$cates->id)!!}" class="btn btn-success"><i ></i>Xóa</a>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>


                  <div class="pull-right">
                  {!! $listCate->render()!!}
                  </div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->












        </section>

@stop
