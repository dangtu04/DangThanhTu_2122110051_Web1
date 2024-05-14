<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./image/favorite.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>


    <!-- link bootstrap -->
    <link rel="stylesheet" href="{{ asset('./css/bootstrap.min.css')}}">
    <!-- link css -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <!-- font -->
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css')}}" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Header Start -->
    <section class="header">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-3">
                    <img src={{ asset('./image/logo.webp')}} class="img-fluid" alt="logo" style="width: 200px;height: 50px;">
                </div>
                <div class="col-md-5">
                    <div class="input-group mb-3 pt-1 ">
                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text bg-main text-white" id=""><i class="fa-solid fa-magnifying-glass"></i></span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="row">                       
                        <div class="col-8 ps-3 py-2">
                            <a class="position-relative">
                                <!-- <i class="fa-solid fa-cart-shopping fs-2 text-main"></i> -->
                                <i class="fa fa-shopping-cart fs-2 text-main"></i>
                                <!-- <span class="position-absolute top-3 start-100 translate-middle mt-2  badge rounded-pill bg-my-primary">
                                0
                                </span> -->
                            </a>
                        </div>
                        <div class="col-4">
                            <a type="button" class="position-relative">
                               <span class="">
                                    <i class="fa-regular fa-bell text-main fs-3 ps-5 my-3 mb-1 "></i>
                                    <span class="position-absolute top-0 start-100  my-3 translate-middle p-2 bg-my-primary border border-light rounded-circle"></span>
                               </span>
                            </a>
                            
                        </div>
                    </div>
                </div>
                
                <div class="col-md-1">                    
                    <div class="fs-2">
                        <i class="fa-regular fa-user ps-4  text-main"></i>
                    </div>                     
                </div>
            </div>
        </div>
    </section>
    <!-- Header end -->

     <!-- Menu start -->
     <section class="menu bg-main">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon text-white"></span> -->
                    <i class="fa-solid fa-bars text-white fs-3"></i>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link text-white fs-5 py-1"aria-current="page" href=" ">Trang chủ</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white" href="/">Giới thiệu</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white" href="san-pham">Sản phẩm</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white" href="lien-he">Liên hệ</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Dropdown link
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
            </nav>
        </div>
    </section>
    <!-- Menu end -->

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

   
     <!-- Footer Start -->
     <section class="footer bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Get in Touch</h2>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>103 Tăng Nhơn Phú, Thủ Đức</p>
                            <p><i class="fa fa-envelope"></i>tudang@gmail.com</p>
                            <p><i class="fa fa-phone"></i>+123-456-7890</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Follow Us</h2>
                        <div class="contact-info">
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Company Info</h2>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Condition</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Purchase Info</h2>
                        <ul>
                            <li><a href="#">Pyament Policy</a></li>
                            <li><a href="#">Shipping Policy</a></li>
                            <li><a href="#">Return Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="row payment align-items-center">
                <div class="col-md-6">
                    <div class="payment-method">
                        <h2>We Accept:</h2>
                        <img src="./image/payment-method.png" alt="Payment Method" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-security">
                        <h2>Secured By:</h2>
                        <img src="./image/godaddy.svg" alt="Payment Security" />
                        <img src="./image/norton.svg" alt="Payment Security" />
                        <img src="./image/ssl.svg" alt="Payment Security" />
                    </div>
                </div>
            </div>
        </div>
    </section>
  <!-- Footer End -->  



    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>