<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="far fa-user"></i> Quản lý
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-power-off"></i> Thoát
        </a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('image/nguyenvancut.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">DangThanhTu</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.product.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tất cả sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.category.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.brand.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thương hiệu</p>
                </a>
              </li>
            </ul>
          </li>        
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Bài viết
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.post.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tất cả bài viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.topic.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chủ đề</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.order.index')}}" class="nav-link">
              <i class="fas fa-shopping-bag"></i>
              <p>Đơn hàng</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.contact.index')}}" class="nav-link">
              <i class="fas fa-id-card"></i>
              <p>Liên hệ</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Giao diện
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.menu.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.banner.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Thành viên
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.user.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tất cả thành viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.user.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm thành viên</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <div class="content-wrapper">
    <!-- CONTENT -->
    <main>
      @yield('content')
    </main>
    <!-- /.CONTENT -->
  </div>
  
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Sửa bởi: Hồ Diên Lợi</strong> All rights reserved.
  </footer>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src=" {{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script src=" {{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src=" {{ asset('dist/js/adminlte.min.js')}}"></script>
  <!-- Toast Notification Script -->
  <script>
    @if (session('message'))
        @php
        $arrMessage = session('message');
        @endphp
        $(document).ready(function() {
          toastr.options = {
              "closeButton": true,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "timeOut": "3000", 
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut",
              "preventDuplicates": true 
          };
            toastr["{{ $arrMessage['type'] }}"]("{{ $arrMessage['msg'] }}");
        });
    @endif
</script>

</body>
</html>