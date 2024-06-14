@extends('layouts.admin')
@section('title', 'Chỉnh sửa danh mục')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý danh mục</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Blank Page</li>
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
                  <a href="{{ route('admin.category.index') }}" class="btn btn-info">
                    <i class="fas fa-arrow-left"></i> Quay lại
                  </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.category.update',['id'=>$category->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                  <label for="name">Tên danh mục</label>
                  <input type="text" value="{{ old('name',$category->name)}}" name="name" id="name" class="form-control">
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="description">Mô tả</label>
                  <textarea name="description" id="description" class="form-control">{{ old('description',$category->description)}}</textarea>
                </div>
                <div class="mb-3">
                  <label for="parent_id">Danh mục cha</label>
                  <select name="parent_id" id="parent_id" class="form-control">
                    <option value="0">None</option>
                    {!! $htmlparentid !!}
                  </select>
                </div>
                <div class="mb-3">
                  <label for="sort_order">Sắp xếp</label>
                  <select name="sort_order" id="sort_order" class="form-control">
                    <option value="0">None</option>
                    {!! $htmlsortorder !!}
                  </select>
                </div>
                <div class="mb-3">
                  <label for="image">Hình</label>
                  <input type="file" name="image" id="image" class="form-control">
                  @error('image')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                  @if($category->image)
                    <img src="{{ asset('images/categories/' . $category->image) }}" alt="{{ $category->name }}" style="width: 100px; margin-top: 10px;">
                  @endif
                </div>
                <div class="mb-3">
                  <label for="status">Trạng thái</label>
                  <select name="status" id="status" class="form-control">
                    <option value="2" {{ ($category->status==2)?'selected':'' }}>Chưa xuất bản</option>
                    <option value="1" {{ $category->status==1?'selected':'' }}>Xuất bản</option>
                </select>                
                </div>
                <div class="mb-3">
                  <button type="submit" name="create" class="btn btn-success"><i class="fas fa-save"></i> Cập nhật</button>
                </div>
              </form>
        </div>
    </div>
</section>
@endsection
