@extends('layouts.admin')
@section('title', 'Chi tiết thương hiệu')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết thương hiệu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Chi tiết thương hiệu</li>
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
                    $args = ['id' => $brand->id];
                @endphp
                <div class="col-12 text-right">
                    <a href="{{ route('admin.brand.edit', $args) }}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.brand.delete', $args) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.brand.index') }}">
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
                        <td><img src="{{ asset('images/brands/'.$brand->image) }}" style="width: 100px" alt="{{ $brand->image }}"></td>
                    </tr>
                    <tr>
                        <th>Tên thương hiệu</th>
                        <td>{{ $brand->name }}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{ $brand->slug }}</td>
                    </tr>
                    <tr>
                        <th>Thứ tự</th>
                        <td>{{ $brand->sort_order }}</td>
                    </tr>
                    <tr>
                        <th>Mô tả</th>
                        <td>{{ $brand->description }}</td>
                    </tr>
                    <tr>
                        <th>Ngày tạo</th>
                        <td>{{ $brand->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Ngày cập nhật</th>
                        <td>{{ $brand->updated_at }}</td>
                    </tr>
                    <tr>
                        <th>Người tạo</th>
                        <td>{{ $brand->created_by }}</td>
                    </tr>
                    <tr>
                        <th>Người cập nhật</th>
                        <td>{{ $brand->updated_by }}</td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td>{{ $brand->status }}</td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <td>{{ $brand->id }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
