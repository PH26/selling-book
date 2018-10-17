<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Quản lý website</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/_all-skins.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
   <!-- js ckediter -->
   <script src="{{ url('backend/js/jQuery-2.1.4.min.js') }}"></script>
   <script src="{{ url('backend/js/myscript.js') }}"></script>
   <!-- ckediter và ckfinder -->
    <script type="text/javascript" src="{{ url('backend/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/ckfinder/ckfinder.js') }}"></script>
    <script type="text/javascript">
        var baseURL ="{!! url('/') !!}";
    </script>
    <script type="text/javascript" src="{{ url('backend/func_ckfinder.js') }}"></script>
    <!-- end ckediter và ckfinder -->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="{!! url('admin') !!}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">BooksStore</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Menu-->
              <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                  <li><a class="dropdown-item" href=""><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                  <li><a class="dropdown-item" href=""><i class="fa fa-user fa-lg"></i> Profile</a></li>
                  <li><a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..." />
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="@yield('trangchu') treeview">
              <a href="{!! url('admin') !!}">
                <i class="fa fa-dashboard"></i> <span>Trang chủ Admin</span>
              </a>
            </li>


            <li class="treeview @yield('danhmuc')">
              <a href="javascript:void(0)">
                <i class="fa fa-pencil-square-o"></i> <span>Quản lý danh mục</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="@yield('them_dm')"><a href="{!! url('category/add') !!}"><i class="fa fa-circle-o"></i> Thêm danh mục</a></li>
                <li class="@yield('list_dm')"><a href="{!! url('category/list') !!}"><i class="fa fa-circle-o"></i> Danh sách danh mục</a></li>
              </ul>
            </li>

            <li class="treeview @yield('sanpham')">
              <a href="javascript:void(0)">
                <i class="fa fa-paper-plane-o"></i> <span>Quản lý sản phẩm</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="@yield('them_sp')"><a href="{!! url('product/add') !!}"><i class="fa fa-circle-o"></i> Thêm sản phẩm</a></li>
                <li class="@yield('list_sp')"><a href="{!! url('product/list') !!}"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a></li>
                <li class="@yield('list_danhgia')"><a href="{!! url('product/listdanhgia') !!}"><i class="fa fa-circle-o"></i> Đánh giá</a></li>
              </ul>
            </li>
            <li class="treeview @yield('hoadon')">
              <a href="javascript:void(0)">
                <i class="fa fa-shopping-cart"></i> <span>Quản lý đơn hàng</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="@yield('list_hd')"><a href="{!! url('cart/list') !!}"><i class="fa fa-circle-o"></i> Danh sách đơn hàng</a></li>
                <li><a href="{!! url('cart/khuyenmai') !!}"><i class="fa fa-circle-o"></i> Nhập mã khuyến mại</a></li>
                <li><a href="{!! url('cart/khuyenmai') !!}"><i class="fa fa-circle-o"></i> Danh sách ID khuyến mại</a></li>

              </ul>
            </li>
            <li class="treeview @yield('tintuc')">
              <a href="javascript:void(0)">
                <i class="fa fa-navicon"></i> <span>Quản lý bài viết</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="@yield('them_tt')"><a href="{!! url('tintuc/add') !!}"><i class="fa fa-circle-o"></i> Thêm bài viết</a></li>
                <li class="@yield('list_tt')"><a href="{!! url('tintuc/list') !!}"><i class="fa fa-circle-o"></i> Danh sách bài viết</a></li>
                <li><a href="{!! url('catenew/add') !!}"><i class="fa fa-circle-o"></i> Thêm danh mục</a></li>
              	<li><a href="{!! url('catenew/list') !!}"><i class="fa fa-circle-o"></i> Danh mục bài biết</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="javascript:void(0)">
                <i class="fa fa-gears"></i> <span>User</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{!! url('user/list') !!}"><i class="fa fa-circle-o"></i> Danh sách Users </a></li>
                <li><a href="{!! url('user/add') !!}"><i class="fa fa-circle-o"></i> Thêm Users </a></li>
              </ul>
            </li>
            <!-- end menu -->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('controller')
            <small>@yield('action')</small>
          </h1>
        </section>
                <div class="col-lg-12" style="margin-top:12px;">
                        @if(Session::has('flash_message'))
                            <div class="alert alert-{!! Session::get('flash_level') !!}">
                                {!! Session::get('flash_message') !!}
                            </div>
                        @endif
                    </div>
        <!-- Main content -->
          @yield('content')
        <!-- /.content -->

      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 3.0
        </div>
        <strong>Copyright &copy; 2016</strong>
      </footer>

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->



<script src="{{ url('backend/js/app.min.js') }}"></script>
<script src="{{ url('backend/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ url('backend/js/bootstrap.min.js') }}"></script>


  </body>
</html>
