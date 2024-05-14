<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./image/favorite.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>


    <!-- link bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- link css -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Header Start -->
    <section class="header">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-3">
                    <img src="./image/logo.webp" class="img-fluid" alt="logo" style="width: 200px;height: 50px;">
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
     <section class="breadcrumb container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html" class="text-main">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
            </ol>
        </nav>
    </section>
    <!-- Breadcrumb end -->

    <!-- Contact Start -->
    <div class="contact">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-info">
                        <h2>Văn phòng của chúng tôi</h2>
                        <h3><i class="fa fa-map-marker"></i>20 Tăng Nhơn Phú, Phước Long B, Thủ Đức, Thành phố Hồ Chí Minh</h3>
                        <h3><i class="fa fa-envelope"></i>tudang@gmail.com</h3>
                        <h3><i class="fa fa-phone"></i>+123-456-7890</h3>
                        <div class="social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
             
                <div class="col-lg-6">
                    <div class="contact-form">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Tên" />
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="Tin nhắn"></textarea>
                            </div>
                            <div><button class="btn bg-main text-white" type="submit">Gửi</button></div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1303792274927!2d106.77242411480064!3d10.830680492279441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752701a34a5d5f%3A0x30056b2fdf668565!2zQ2FvIMSR4bqhaSBDxJPEga_imaEgVFAuSENN!5e0!3m2!1svi!2s!4v1554093312286" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


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