@extends('layouts.admin')
@section('title', 'Chi tiết banner')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết banner</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Chi tiết banner</li>
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
                    $args = ['id' => $banner->id];
                @endphp
                <div class="col-12 text-right">
                    <a href="{{ route('admin.banner.edit', $args) }}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.banner.delete', $args) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.banner.index') }}">
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
                        <td><img src="{{ asset('images/banners/'.$banner->image) }}" style="width: 100px" alt="{{ $banner->image }}"></td>
                    </tr>
                    <tr>
                        <th>Tên banner</th>
                        <td>{{ $banner->name }}</td>
                    </tr>
                    <tr>
                        <th>Đường dẫn</th>
                        <td>{{ $banner->link }}</td>
                    </tr>
                    <tr>
                        <th>Vị trí</th>
                        <td>{{ $banner->position }}</td>
                    </tr>
                    <tr>
                        <th>Mô tả</th>
                        <td>{{ $banner->description }}</td>
                    </tr>
                    <tr>
                        <th>Ngày tạo</th>
                        <td>{{ $banner->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Ngày cập nhật</th>
                        <td>{{ $banner->updated_at }}</td>
                    </tr>
                    <tr>
                        <th>Người tạo</th>
                        <td>{{ $banner->created_by }}</td>
                    </tr>
                    <tr>
                        <th>Người cập nhật</th>
                        <td>{{ $banner->updated_by }}</td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td>{{ $banner->status }}</td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <td>{{ $banner->id }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
