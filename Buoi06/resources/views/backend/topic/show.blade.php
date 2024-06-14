@extends('layouts.admin')
@section('title', 'Chi tiết chủ đề')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết chủ đề</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Chi tiết chủ đề</li>
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
                    $args = ['id' => $topic->id];
                @endphp
                <div class="col-12 text-right">
                    <a href="{{ route('admin.topic.edit', $args) }}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.topic.delete', $args) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.topic.index') }}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Tên chủ đề</th>
                        <td>{{ $topic->name }}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{ $topic->slug }}</td>
                    </tr>
                    <tr>
                        <th>Thứ tự</th>
                        <td>{{ $topic->sort_order }}</td>
                    </tr>
                    <tr>
                        <th>Mô tả</th>
                        <td>{{ $topic->description }}</td>
                    </tr>
                    <tr>
                        <th>Ngày tạo</th>
                        <td>{{ $topic->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Ngày cập nhật</th>
                        <td>{{ $topic->updated_at }}</td>
                    </tr>
                    <tr>
                        <th>Người tạo</th>
                        <td>{{ $topic->created_by }}</td>
                    </tr>
                    <tr>
                        <th>Người cập nhật</th>
                        <td>{{ $topic->updated_by }}</td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td>{{ $topic->status }}</td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <td>{{ $topic->id }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
