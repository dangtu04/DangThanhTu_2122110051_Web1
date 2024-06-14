@extends('layouts.admin')
@section('title', 'Quản lý sản phẩm')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý thương hiệu</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Quản lý thương hiệu</li>
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
          <a href="{{ route('admin.brand.trash') }}" class="btn btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
        </div>
      </div>
    </div>
    
     <div class="card-body">
      {{-- @includeIf('components.message') --}}
        <div class="row">
          <div class="col-md-3">
            <form action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                    <label for="name">Tên thương hiệu</label>
                    <input type="text" value="{{ old('name')}}" name="name" id="name" class="form-control">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description')}}</textarea>
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
                </div>
                <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="2">Chưa xuất bản</option>
                        <option value="1">Xuất bản</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" name="create" class="btn btn-success"><i class="fas fa-plus"></i> Thêm thương hiệu</button>
                </div>
            </form>
        </div>
           <div class="col-md-9">
              <table class="table table-bordered">
                <thead>
                  <tr class="text-center">
                    <th style="width: 30px">#</th> 
                    <th style="width: 150px">Hình ảnh</th> 
                    <th>Tên Thương hiệu</th>  
                    <th>Mô tả</th>                 
                    <th>Slug</th>
                    <th style="width: 270px">Hành động</th>
                    <th style="width: 30px">ID</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($list as $row)
                  <tr>
                    <td class="text-center"><input type="checkbox" style="width: 20px"></td>
                    <td class="text-center"><img src="{{ asset('images/brands/'.$row->image) }}" 
                      style="width: 100px" alt="{{ $row->image }}"></td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->description}}</td>
                    <td>{{$row->slug}}</td>                 
                    @php
                      $args = ['id' => $row->id];
                    @endphp
                     <td class="text-center">
                      @if($row->status == 1)
                        <a href="{{ route('admin.brand.status', $args) }}" class="btn btn-success"><i class="fas fa-toggle-on"></i></a>
                      @else
                        <a href="{{ route('admin.brand.status', $args) }}" class="btn btn-danger"><i class="fas fa-toggle-off"></i></a>
                      @endif
                      <a href="{{ route('admin.brand.show', $args) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                      <a href="{{ route('admin.brand.edit', $args) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                      <a href="{{ route('admin.brand.delete', $args) }}" class="btn btn-warning text-white"><i class="far fa-trash-alt"></i></a>
                    </td>
                 
                    <td class="text-center">{{$row->id}}</td>
                    
                  </tr>                    
                @endforeach  
                </tbody>
                
              </table>
           </div>
        </div>
     </div>
  </div>
</section>

@endsection