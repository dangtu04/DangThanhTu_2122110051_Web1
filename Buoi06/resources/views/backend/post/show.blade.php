@extends('layouts.admin')
@section('title', 'Chi tiết bài viết')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết bài viết</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Chi tiết bài viết</li>
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
                    $args = ['id' => $post->id];
                @endphp
                <div class="col-12 text-right">
                    <a href="{{ route('admin.post.edit', $args) }}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.post.delete', $args) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.post.index') }}">
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
                        <td><img src="{{ asset('images/posts/'.$post->image) }}" style="width: 100px" alt="{{ $post->image }}"></td>
                    </tr>
                    <tr>
                        <th>Tiêu đề bài viết</th>
                        <td>{{ $post->title }}</td>
                    </tr>
                    <tr>
                        <th>Tên chủ đề</th>
                        <td>{{ $post->topicname }}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{ $post->slug }}</td>
                    </tr>
                    <tr>
                        <th>Chi tiết</th>
                        <td>{{ $post->detail }}</td>
                    </tr>
                    <tr>
                        <th>Mô tả</th>
                        <td>{{ $post->description }}</td>
                    </tr>
                    <tr>
                        <th>Ngày tạo</th>
                        <td>{{ $post->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Ngày Cập nhật</th>
                        <td>{{ $post->updated_at }}</td>
                    </tr>
                    <tr>
                        <th>Người tạo</th>
                        <td>{{ $post->created_by }}</td>
                    </tr>
                    <tr>
                        <th>Người cập nhật</th>
                        <td>{{ $post->updated_by }}</td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td>{{ $post->status }}</td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <td>{{ $post->id }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
