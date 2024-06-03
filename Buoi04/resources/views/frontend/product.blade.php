@extends('layouts.site')
@section('title', 'Sản phẩm')
@section('header')

@endsection
@section('content')

    <!-- Breadcrumb start -->
    <section class="breadcrumb container my-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html" class="text-main">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tất cả sản phẩm</li>
            </ol>
        </nav>
    </section>
    <!-- Breadcrumb end -->

    <!-- Product start -->
    <section class="product my-3">
      <div class="container">
        <div class="row">

          <x-card-product/>
          <x-card-product/>
          <x-card-product/>
          <x-card-product/>
          <x-card-product/>
          <x-card-product/>
          <x-card-product/>
          <x-card-product/>
          <x-card-product/>          

        </div>
      </div>
    </section>
    <!-- Product end -->


@endsection

@section('footer')
@endsection