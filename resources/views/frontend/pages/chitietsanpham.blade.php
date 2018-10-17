@extends('frontend.master')
@section('title',$data->name)
@section('content')
   <!-- end header -->
<section class="content-slide">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li><a href="{!! url('/') !!}">Trang chủ</a></li>
            <?php $cate_name = DB::table('categories')->where('id',$data->cate_id)->first(); ?>
            <li><a href="/">{!! $cate_name->name !!}</a></li>
            <li class="active">{!! $data->name !!}</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-9 content-product">
          <div class="row">
            <div class="col-md-4">
              <div class="content-product-image">
                <div class="text-center elevate-image"> @if($data->pricesale > 0)<span class="product-item-sale"></span> @endif <img id="zoom" class="img-responsive" src="{!! asset('upload/'.$data->image) !!}" data-zoom="{!! asset('upload/'.$data->image) !!}"> </div>
                <div id="gallery_01">
                  <div id="owl-product">
                    <div class="item"> <a href="javascript:void(0)" data-zoom-image="{!! asset('upload/'.$data->image) !!}" data-image="{!! asset('upload/'.$data->image) !!}"><img id="zoom" src="{!! asset('upload/'.$data->image) !!}"></a> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <h1 class="product-name">{!! $data->name !!}</h1>
              <p class="product-availability">Tình trạng: <span> Còn hàng </span></p>
              <p class="product-price"> @if($data->pricesale > 0)<?php echo number_format($data->pricesale,0,',','.') ?>đ<span><?php echo number_format($data->price,0,',','.') ?>đ </span></p>
              @else
              <p class="product-price"><?php echo number_format($data->price,0,',','.') ?>đ</p>
              @endif
              <p class="product-description">
                {!! $data->intro!!}
               </p>
              <div class="form-add-cart">
                  <label for="">Số lượng</label>
                  <div class="fac-quantity">
                    <input type="text" value="1" class="quantity" name="quantity" disabled="disabled">
                  </div>
                 <!-- <a href="javascript:void(0)" class="product-item-cart add_to_cart" data-id="{!! $data->id !!}"><span></span>Thêm vào giỏ</a> -->
                 <a href="{!!url('addtocart',[$data->id])!!}" class="product-item-cart " ><span></span>Thêm vào giỏ</a>

              </div>
            </div>
          </div>
        </div>
      <div class="col-md-12 content-product-tabs">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô tả sản phẩm</a></li>
      <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Đánh giá</a></li>          </ul>
      <!-- Tab panes -->
      <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home">
        {!! $data->content !!}
      </div>
      <div role="tabpanel" class="tab-pane" id="profile">
      <!-- -->
      <!-- đánh giá -->
        <!-- -->
      <form action="/" id="contact" method="post">
        <div class="col-md-6">
          Chọn số sao:
          @for($i = 1; $i <= 5; $i++)
            @if($i == 5)
            <input type="radio" name="danhgia" value="{!! $i !!}" title="{!! $i !!} sao" checked="checked"> {!! $i !!} sao
            @else
            <input type="radio" name="danhgia" value="{!! $i !!}" title="{!! $i !!} sao"> {!! $i !!} sao
            @endif
          @endfor
          <div class="form-contact"  style="margin-top:5px;">
              <input type="hidden" value="{!! $data->id !!}" name="idproduct" class="ip_product">
              <input type="text" placeholder="Họ và tên" value="{!! old('name') !!}" name="name" title="First Name" class="input-text txtname">
              <input type="text" placeholder="Email" value="{!! old('email') !!}" class="input-text txtemail" name="email">
              <textarea placeholder="Nội dung" name="content" title="Comment" class="required-entry input-text txtcontent" cols="5" rows="3">{!! old('conttent') !!}</textarea>
              <button type="button" class="comment-submit send_danh_gia">Gửi</button>
          </div>
        </div>
        <span class="guidulieu"></span>
       </form>
      </div>
      </div>
      </div>
        </div>
      </div>
  </section>
@stop
