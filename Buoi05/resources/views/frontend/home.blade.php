@extends('layouts.site')
@section('title', 'Trang chủ')
@section('header')

@endsection
@section('content')

    <!-- Slider start -->
    <x-slider/>
    <!-- Slider end -->

    <!-- Promotional Product start -->
    <x-promotional-product/>
    <!-- Promotional Product end -->
    
    <!-- Promotional Product start -->
    <x-new-product/>
    <!-- Promotional Product end -->

    <!-- Post start -->
    <x-post/>
    <!-- Post end -->
@endsection

@section('footer')
@endsection