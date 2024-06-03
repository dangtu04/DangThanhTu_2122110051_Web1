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
          <a class="btn btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
        </div>
      </div>
    </div>
    
     <div class="card-body">
        <div class="row">
           <div class="col-md-3">
              <div class="mb-3">
                 <label>Tên thương hiệu (*)</label>
                 <input type="text" name="name" id="name" placeholder="Nhập tên thương hiệu" class="form-control"
                    onkeydown="handle_slug(this.value);">
              </div>
              <div class="mb-3">
                 <label>Slug</label>
                 <input type="text" name="slug" id="slug" placeholder="Nhập slug" class="form-control">
              </div>            
              <div class="mb-3">
                 <label>Hình đại diện</label>
                 <input type="file" name="image" class="form-control">
              </div>
              <div class="mb-3">
                 <label>Trạng thái</label>
                 <select name="status" class="form-control">
                    <option value="1">Xuất bản</option>
                    <option value="2">Chưa xuất bản</option>
                 </select>
              </div>
              <div class="mb-3">
                <a class="btn btn-success"><i class="fas fa-plus"></i> Thêm thương hiệu</a>
              </div>
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
                    <td class="text-center"><img src="{{ asset('image/brands/'.$row->image) }}" 
                      style="width: 100px" alt="{{ $row->image }}"></td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->description}}</td>
                    <td>{{$row->slug}}</td>                 
                    @php
                      $args = ['id' => $row->id];
                    @endphp
                    <td class="text-center">
                      <a href="{{ route('admin.brand.status', $args)}}" class="btn btn-success"><i class="fas fa-toggle-on"></i></a>
                      <a href="{{ route('admin.brand.status', $args)}}" class="btn btn-danger"><i class="fas fa-toggle-off"></i></a>
                      <a href="{{ route('admin.brand.show', $args)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                      <a href="{{ route('admin.brand.edit', $args)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                      <a href="{{ route('admin.brand.delete', $args)}}" class="btn btn-warning text-white"><i class="far fa-trash-alt"></i></a>
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