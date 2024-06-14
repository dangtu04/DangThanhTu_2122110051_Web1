<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('image/favorite.ico') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang chủ')</title>

    <!-- link bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- link css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Header Start -->
    <section class="header">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('image/logo.webp') }}" class="img-fluid" alt="logo" style="width: 200px; height: 50px;">
                </div>
                <div class="col-md-5">
                    <div class="input-group mb-3 pt-1">
                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text bg-main text-white"><i class="fa-solid fa-magnifying-glass"></i></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">                       
                        <div class="col-8 ps-3 py-2">
                            <a class="position-relative">
                                <i class="fa fa-shopping-cart fs-2 text-main"></i>
                            </a>
                        </div>
                        <div class="col-4">
                            <a type="button" class="position-relative">
                                <span>
                                    <i class="fa-regular fa-bell text-main fs-3 ps-5 my-3 mb-1"></i>
                                    <span class="position-absolute top-0 start-100 my-3 translate-middle p-2 bg-my-primary border border-light rounded-circle"></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">                    
                    <div class="fs-2">
                        <i class="fa-regular fa-user ps-4 text-main"></i>
                    </div>                     
                </div>
            </div>
        </div>
        @yield('header')
    </section>
    <!-- Header end -->


    <main>
        @yield('content')
    </main>

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
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
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
                            <li><a href="#">Payment Policy</a></li>
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
                        <img src="{{ asset('image/payment-method.png') }}" alt="Payment Method" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-security">
                        <h2>Secured By:</h2>
                        <img src="{{ asset('image/godaddy.svg') }}" alt="Payment Security" />
                        <img src="{{ asset('image/norton.svg') }}" alt="Payment Security" />
                        <img src="{{ asset('image/ssl.svg') }}" alt="Payment Security" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer End -->  

    <!-- Copyright Start -->
    <section class="footer-bottom bg-dark text-white py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 copyright">
                    <p>Copyright &copy; <a href="#">Your Site Name</a>. All Rights Reserved</p>
                </div>
                <div class="col-md-6 template-by">
                    <p>Designed By: <a href="#"></a></p>
                </div>
            </div>
        </div>
        @yield('footer')
    </section>
    <!-- Copyright End -->  
        
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
