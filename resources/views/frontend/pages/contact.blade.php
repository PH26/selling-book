@extends('frontend.master')
@section('title','Liên hệ')
@section('lienhe','active')
@section('content')
<div id="content">
  <section class="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li><a href="{!! url('/') !!}">Trang chủ</a></li>
            <li class="active">Liên hệ</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="form-contact">
            <form action="{!!url('lien-he')!!}" id="contact"  method="post">
              <input type="hidden" name="_token" value="{!!csrf_token()!!}" />
              <input type="text" placeholder="Họ và tên" value="{!! old('name') !!}" name="name" title="First Name" class="input-text ">
              <input type="text" placeholder="Email" value="{!! old('email') !!}" class="input-text" name="email">
              <textarea placeholder="Nội dung" name="content" title="Comment" class="required-entry input-text" cols="5" rows="3">{!! old('content') !!}</textarea>
              <button type="submit" class="comment-submit">Gửi</button>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-contact">
            bản đồ
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@stop
