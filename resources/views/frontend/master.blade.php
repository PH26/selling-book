<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ url('frontend/css/bootstrap.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ url('frontend/css/css.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ url('frontend/css/font-awesome.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ url('frontend/css/jquery.mmenu.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ url('frontend/css/owl.carousel.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ url('frontend/css/style.css') }}"/>
<script type="text/javascript" src="{{ url('frontend/js/jquery-1.11.3.min.js') }}"></script>
<script type="text/javascript" src="{{ url('frontend/js/ajaxCart.js') }}"></script>
<script type="text/javascript" src="{{ url('frontend/js/Danhgia.js') }}"></script>
</head>
<body>
@include('frontend.blocks.menu-reponsive')

<div class="page mm-page mm-slideout" id="mm-0">
  <div id="content">

   <!-- header -->
    @include('frontend.blocks.header')
   <!-- end header -->
    @if(Session::has('flash_message'))
      <div class="alert alert-{!! Session::get('flash_level') !!}" style="margin-top:10px">
          {!! Session::get('flash_message') !!}
      </div>
    @endif

    <!--- content -->
    @yield('content')
      <!-- end content -->
    <a id="yt-totop" href="#" title="Go to Top" style="display: block;"></a>

        <!-- end sản phẩm bán chạy-->
        @include('frontend.blocks.sendmail')
    <!-- end content -->
    <!-- footer -->
       @include('frontend.blocks.footer')
    <!-- end footer -->
  </div>
</div>

<script type="text/javascript" src="{{ url('frontend/js/option-selectors.js') }}"></script>
<script type="text/javascript" src="{{ url('frontend/js/jquery.elevatezoom.js') }}"></script>
<script type="text/javascript" src="{{ url('frontend/js/api.jquery.js') }}"></script>
<script type="text/javascript" src="{{ url('frontend/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ url('frontend/js/jquery.mmenu.min.js') }}"></script>
<script type="text/javascript" src="{{ url('frontend/js/main.js') }}"></script>
<script type="text/javascript" src="{{ url('frontend/js/notify.js') }}"></script>
<script type="text/javascript" src="{{ url('frontend/js/owl.carousel.min.js') }}"></script>
</body>
</html>
