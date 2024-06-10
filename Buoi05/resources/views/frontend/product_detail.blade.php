@extends('layouts.site')
@section('title', 'Chi tiết sản phẩm')
@section('header')
@endsection

@section('content')
 <!-- Breadcrumb start -->
 <section class="breadcrumb container my-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html" class="text-main">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
        </ol>
    </nav>
  </section>
  <!-- Breadcrumb end -->

  <!-- Product Detail Start -->
  <div class="product-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="product-slider-single normal-slider">
                                <img src="{{ asset('./image/ao-sweater-nam-nu.webp')}}" alt="Product Image">                                
                            </div>                                    
                        </div>
                        <div class="col-md-7">
                            <div class="product-content">
                                <div class="title"><h2>Áo sweater nam nữ</h2></div>
                                <div class="price">
                                    <h4>Giá:</h4>
                                    <p>99₫ <span>500₫</span></p>
                                </div>
                                <div class="quantity">
                                    <h4>Số lượng:</h4>
                                    <div class="qty">
                                        <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                        <input type="text" value="1">
                                        <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="p-size">
                                    <h4>Kích cỡ:</h4>
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" class="btn bg-main text-white border">S</button>
                                        <button type="button" class="btn bg-main text-white border">M</button>
                                        <button type="button" class="btn bg-main text-white border">L</button>
                                        <button type="button" class="btn bg-main text-white border">XL</button>
                                    </div> 
                                </div>
                                <div class="action">
                                    <a class="btn border bg-main text-white" href="#"><i class="fa fa-shopping-cart text-white"></i>Thêm vào giỏ hàng</a>
                                    <a class="btn border bg-main text-white" href="#"><i class="fa fa-shopping-bag text-white"></i>Mua ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row product-detail-bottom">
                    <div class="col-lg-12">
                        <div class="tab-content">
                            <div id="description" class="container tab-pane active">
                                <h4 class="text-main">Mô tả sản phẩm</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque. Suspendisse sit amet neque neque. Praesent suscipit et magna eu iaculis. Donec arcu libero, commodo ac est a, malesuada finibus dolor. Aenean in ex eu velit semper fermentum. In leo dui, aliquet sit amet eleifend sit amet, varius in turpis. Maecenas fermentum ut ligula at consectetur. Nullam et tortor leo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Side Bar Start -->
            <div class="col-lg-4 sidebar">
                <div class="sidebar-widget category">
                    <h2 class="title">Danh mục sản phẩm</h2>
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link mx-3 text-main" href="#">Thời trang nam</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-3 text-main" href="#">Thời trang nữ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-3 text-main" href="#">Phụ kiện</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-3 text-main" href="#">Áo nam</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-3 text-main" href="#">Áo nữ</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div> 

            <!-- Side Bar End -->
        </div>
    </div>
  </div>
  <!-- Product Detail End -->

  @endsection
   

   
@section('footer')
@endsection