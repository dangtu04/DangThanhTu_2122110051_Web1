@extends('layouts.admin')
@section('title', 'Chỉnh sửa sản phẩm')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý sản phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa sản phẩm</li>
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
                  <a href="{{ route('admin.product.index') }}" class="btn btn-info">
                    <i class="fas fa-arrow-left"></i> Quay lại
                  </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                  <label for="name">Tên sản phẩm</label>
                  <input type="text" value="{{ old('name', $product->name) }}" name="name" id="name" class="form-control">
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="category_id">Danh mục</label>
                    <select name="category_id" id="category_id" class="form-control">
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ ($category->id == $product->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="brand_id">Thương hiệu</label>
                    <select name="brand_id" id="brand_id" class="form-control">
                      @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ ($brand->id == $product->brand_id) ? 'selected' : '' }}>{{ $brand->name }}</option>
                      @endforeach
                    </select>
                  </div>
                <div class="mb-3">
                  <label for="price">Giá</label>
                  <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}">
                </div>
                <div class="mb-3">
                    <label for="pricesale">Giá khuyến mãi</label>
                    <input type="text" name="pricesale" id="pricesale" class="form-control" value="{{ old('pricesale', $product->pricesale) }}">
                </div>
                <div class="mb-3">
                    <label for="detail">Chi tiết</label>
                    <textarea name="detail" id="detail" class="form-control">{{ old('detail', $product->detail) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                </div>
                <div class="mb-3">
                  <label for="image">Hình</label>
                  <input type="file" name="image" id="image" class="form-control">
                  @error('image')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                  @if($product->image)
                    <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100px; margin-top: 10px;">
                  @endif
                </div>
                <div class="mb-3">
                  <label for="status">Trạng thái</label>
                  <select name="status" id="status" class="form-control">
                    <option value="2" {{ ($product->status == 2) ? 'selected' : '' }}>Chưa xuất bản</option>
                    <option value="1" {{ ($product->status == 1) ? 'selected' : '' }}>Xuất bản</option>
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
