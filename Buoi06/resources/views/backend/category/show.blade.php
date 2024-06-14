@extends('layouts.admin')
@section('title', 'Chi tiết danh mục')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết danh mục</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Chi tiết danh mục</li>
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
                    $args = ['id' => $category->id];
                @endphp
                <div class="col-12 text-right">
                    <a href="{{ route('admin.category.edit', $args) }}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.category.delete', $args) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.category.index') }}">
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
                        <td><img src="{{ asset('images/categories/'.$category->image) }}" style="width: 100px" alt="{{ $category->image }}"></td>
                    </tr>
                    <tr>
                        <th>Tên danh mục</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                    <tr>
                        <th>Danh mục cha</th>
                        <td>{{ $category->parent_id }}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{ $category->slug }}</td>
                    </tr>
                    <tr>
                        <th>Thứ tự</th>
                        <td>{{ $category->sort_order }}</td>
                    </tr>
                    <tr>
                        <th>Mô tả</th>
                        <td>{{ $category->description }}</td>
                    </tr>
                    <tr>
                        <th>Ngày tạo</th>
                        <td>{{ $category->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Ngày cập nhật</th>
                        <td>{{ $category->updated_at }}</td>
                    </tr>
                    <tr>
                        <th>Người tạo</th>
                        <td>{{ $category->created_by }}</td>
                    </tr>
                    <tr>
                        <th>Người cập nhật</th>
                        <td>{{ $category->updated_by }}</td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td>{{ $category->status }}</td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <td>{{ $category->id }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
