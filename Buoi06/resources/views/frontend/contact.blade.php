@extends('layouts.site')
@section('title', 'Liên hệ')
@section('header')
@endsection

@section('content')
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


@endsection  

   
@section('footer')
@endsection