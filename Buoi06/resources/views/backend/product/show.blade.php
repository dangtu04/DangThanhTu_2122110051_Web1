@extends('layouts.admin')
@section('title', 'Chi tiết sản phẩm')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết sản phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">

    <div class="card">
        <div class="card-header">
            <div class="row">
                @php
                    $args = ['id' => $product->id];
                @endphp
                <div class="col-12 text-right">
                    <a href="{{ route('admin.product.edit', $args) }}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.product.delete', $args) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.product.index') }}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 150px">Hình ảnh</th>
                        <td><img src="{{ asset('images/products/'.$product->image) }}" style="width: 100px" alt="{{ $product->image }}"></td>
                    </tr>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <th>Danh mục</th>
                        <td>{{ $product->categoryname }}</td>
                    </tr>
                    <tr>
                        <th>Thương hiệu</th>
                        <td>{{ $product->brandname }}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{ $product->slug }}</td>
                    </tr>
                    <tr>
                        <th>Giá</th>
                        <td>{{ $product->price }}</td>
                    </tr>
                    <tr>
                        <th>Giá khuyến mãi</th>
                        <td>{{ $product->pricesale }}</td>
                    </tr>
                    <tr>
                        <th>Chi tiết</th>
                        <td>{{ $product->detail }}</td>
                    </tr>
                    <tr>
                        <th>Mô tả</th>
                        <td>{{ $product->description }}</td>
                    </tr>
                    <tr>
                        <th>Ngày tạo</th>
                        <td>{{ $product->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Ngày Cập nhật</th>
                        <td>{{ $product->updated_at }}</td>
                    </tr>
                    <tr>
                        <th>Người tạo</th>
                        <td>{{ $product->created_by }}</td>
                    </tr>
                    <tr>
                        <th>Người cập nhật</th>
                        <td>{{ $product->updated_by }}</td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td>{{ $product->status }}</td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <td>{{ $product->id }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
