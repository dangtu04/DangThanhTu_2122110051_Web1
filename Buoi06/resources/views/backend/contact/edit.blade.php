@extends('layouts.admin')
@section('title', 'Chỉnh sửa liên lạc')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chỉnh sửa liên lạc</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.contact.index') }}">Quản lý liên lạc</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa liên lạc</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
           
            <div class="card-tools">
                <a href="{{ route('admin.contact.index') }}" class="btn btn-sm btn-info">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.contact.update', ['id' => $contact->id]) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name">Tên liên lạc</label>
                    <input type="text" value="{{ old('name', $contact->name) }}" name="name" id="name" class="form-control">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" value="{{ old('email', $contact->email) }}" name="email" id="email" class="form-control">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" value="{{ old('phone', $contact->phone) }}" name="phone" id="phone" class="form-control">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title">Tiêu đề</label>
                    <input type="text" value="{{ old('title', $contact->title) }}" name="title" id="title" class="form-control">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content">Nội dung</label>
                    <textarea name="content" id="content" class="form-control">{{ old('content', $contact->content) }}</textarea>
                    @error('content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{ $contact->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                        <option value="0" {{ $contact->status == 0 ? 'selected' : '' }}>Chưa xuất bản</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
