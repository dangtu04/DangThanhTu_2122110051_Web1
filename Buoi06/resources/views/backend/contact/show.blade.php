@extends('layouts.admin')
@section('title', 'Chi tiết liên hệ')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết liên hệ</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Chi tiết liên hệ</li>
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
                    $args = ['id' => $contact->id];
                @endphp
                <div class="col-12 text-right">
                    <a href="{{ route('admin.contact.edit', $args) }}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.contact.delete', $args) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.contact.index') }}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Tên liên hệ</th>
                        <td>{{ $contact->name }}</td>
                    </tr>
                    <tr>
                        <th>Tên người dùng</th>
                        <td>{{ $contact->username }}</td>
                    </tr>
                    <tr>
                        <th>Số điện thoại</th>
                        <td>{{ $contact->phone }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $contact->email }}</td>
                    </tr>
                    <tr>
                        <th>Tiêu đề</th>
                        <td>{{ $contact->title }}</td>
                    </tr>
                    <tr>
                        <th>Nội dung</th>
                        <td>{{ $contact->content }}</td>
                    </tr>
                    <tr>
                        <th>Ngày tạo</th>
                        <td>{{ $contact->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Ngày Cập nhật</th>
                        <td>{{ $contact->updated_at }}</td>
                    </tr>
                    <tr>
                        <th>Người tạo</th>
                        <td>{{ $contact->created_by }}</td>
                    </tr>
                    <tr>
                        <th>Người cập nhật</th>
                        <td>{{ $contact->updated_by }}</td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td>{{ $contact->status }}</td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <td>{{ $contact->id }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
