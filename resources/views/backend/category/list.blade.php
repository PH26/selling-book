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
                        <th style="width:6%" align="center">ID</th>
                        <th scope="col">Loại danh mục</th>
                        <th scope="col">Thao Tác</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach($listCate as $cates)
                      <tr>
                        <td align="center">{!! $cates->id!!}</td>
                        <td >{!! $cates->name !!}</td>
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
