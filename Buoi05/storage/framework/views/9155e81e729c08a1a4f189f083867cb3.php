<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="<?php echo e(asset('image/favorite.ico')); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Trang chủ'); ?></title>

    <!-- link bootstrap -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <!-- link css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Header Start -->
    <section class="header">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-3">
                    <img src="<?php echo e(asset('image/logo.webp')); ?>" class="img-fluid" alt="logo" style="width: 200px; height: 50px;">
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
    </section>
    <!-- Header end -->

    <!-- Menu start -->
    <section class="menu bg-main">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars text-white fs-3"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-white fs-5 py-1" aria-current="page" href="/">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="<?php echo e(url('/gioi-thieu')); ?>">Giới thiệu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="<?php echo e(url('/san-pham')); ?>">Sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="<?php echo e(url('/lien-he')); ?>">Liên hệ</a>
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
        <?php echo $__env->yieldContent('header'); ?>
    </section>
    <!-- Menu end -->

    <main>
        <?php echo $__env->yieldContent('content'); ?>
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
                        <img src="<?php echo e(asset('image/payment-method.png')); ?>" alt="Payment Method" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-security">
                        <h2>Secured By:</h2>
                        <img src="<?php echo e(asset('image/godaddy.svg')); ?>" alt="Payment Security" />
                        <img src="<?php echo e(asset('image/norton.svg')); ?>" alt="Payment Security" />
                        <img src="<?php echo e(asset('image/ssl.svg')); ?>" alt="Payment Security" />
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
        <?php echo $__env->yieldContent('footer'); ?>
    </section>
    <!-- Copyright End -->  
        
    <script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\DangThanhTu_Laravel_W1\resources\views/layouts/site.blade.php ENDPATH**/ ?>