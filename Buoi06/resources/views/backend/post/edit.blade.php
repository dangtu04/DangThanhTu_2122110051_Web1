@extends('layouts.admin')
@section('title', 'Chỉnh sửa bài viết')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý bài viết</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa bài viết</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                  <a href="{{ route('admin.post.index') }}" class="btn btn-info">
                    <i class="fas fa-arrow-left"></i> Quay lại
                  </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.post.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                  <label for="title">Tiêu đề bài viết</label>
                  <input type="text" value="{{ old('title', $post->title) }}" name="title" id="title" class="form-control">
                  @error('title')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>              
                <div class="mb-3">
                    <label for="topic_id">Chủ đề</label>
                    <select name="topic_id" id="topic_id" class="form-control">
                      @foreach ($topics as $topic)
                        <option value="{{ $topic->id }}" {{ ($topic->id == $post->topic_id) ? 'selected' : '' }}>{{ $topic->name }}</option>
                      @endforeach
                    </select>
                  </div>
                <div class="mb-3">
                    <label for="detail">Chi tiết</label>
                    <textarea name="detail" id="detail" class="form-control">{{ old('detail', $post->detail) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description', $post->description) }}</textarea>
                </div>
                <div class="mb-3">
                  <label for="type">Kiểu</label>
                  <select name="type" id="type" class="form-control">
                      <option value="post">Bài viết</option>
                      <option value="page">Trang đơn</option>
                  </select>
              </div>
                <div class="mb-3">
                  <label for="image">Hình</label>
                  <input type="file" name="image" id="image" class="form-control">
                  @error('image')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                  @if($post->image)
                    <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->name }}" style="width: 100px; margin-top: 10px;">
                  @endif
                </div>
                <div class="mb-3">
                  <label for="status">Trạng thái</label>
                  <select name="status" id="status" class="form-control">
                    <option value="2" {{ ($post->status == 2) ? 'selected' : '' }}>Chưa xuất bản</option>
                    <option value="1" {{ ($post->status == 1) ? 'selected' : '' }}>Xuất bản</option>
                </select>                
                </div>
                <div class="mb-3">
                  <button type="submit" name="update" class="btn btn-success"><i class="fas fa-save"></i> Cập nhật</button>
                </div>
              </form>
        </div>
    </div>
</section>
@endsection
