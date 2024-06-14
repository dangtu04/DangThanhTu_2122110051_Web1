@extends('layouts.admin')
@section('title', 'Quản lý banner')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý banner</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Quản lý banner</li>
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
                <a href="{{ route('admin.banner.trash') }}" class="btn btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
              </div>
            </div>
        </div>
        <div class="card-body"> 
          {{-- @includeIf('components.message')         --}}
          <div class="row">
              <div class="col-md-3">
                  <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                    @csrf  
                    <div class="mb-3">
                          <label for="name">Tên banner</label>
                          <input type="text" value="{{ old('name')}}" name="name" id="name" class="form-control">
                          @error('name')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      <div class="mb-3">
                          <label for="link">Liên kết</label>
                          <input type="text" value="{{ old('link')}}" name="link" id="link" class="form-control">
                      </div>
                      <div class="mb-3">
                          <label for="description">Mô tả</label>
                          <textarea name="description" id="description" class="form-control">{{ old('description')}}</textarea>
                      </div>
                      <div class="mb-3">
                          <label for="position">Vị trí</label>
                          <select name="position" id="position" class="form-control">
                              <option value="0">None</option>
                              @foreach ($list as $row)
                                <option value="{{ $row->position }}">Sau:{{ $row->name }}</option>
                              @endforeach
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
                          <button type="submit" name="create" class="btn btn-success"><i class="fas fa-plus"></i>   Thêm banner</button>
                      </div>
                  </form>
              </div>
              <div class="col-md-9">
                <table id="banner-table" class="table table-bordered table-striped">
                  <thead>
                      <tr class="text-center">
                        <th style="width: 30px">#</th> 
                        <th style="width: 150px">Hình ảnh</th>                                       
                        <th>Tên banner</th>   
                        <th>Liên kết</th>
                        <th>Vị trí</th>
                        <th style="width: 270px">Chức năng</th>
                        <th style="width: 30px">ID</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($list as $row)
                      <tr>
                        <td class="text-center"><input type="checkbox" style="width: 20px"></td>
                        <td class="text-center"><img src="{{ asset('images/banners/'.$row->image) }}" 
                          style="width: 100px" alt="{{ $row->image }}"></td>
                        <td>{{$row->name}}</td>                  
                        <td>{{$row->link}}</td>
                        <td>{{$row->position}}</td>
                        @php
                          $args = ['id' => $row->id];
                        @endphp
                         <td class="text-center">
                          @if($row->status == 1)
                            <a href="{{ route('admin.banner.status', $args)}}" class="btn btn-success"><i class="fas fa-toggle-on"></i></a>
                           @else
                            <a href="{{ route('admin.banner.status', $args)}}" class="btn btn-danger"><i class="fas fa-toggle-off"></i></a>
                          @endif 
                          <a href="{{ route('admin.banner.show', $args)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                          <a href="{{ route('admin.banner.edit', $args)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                          <a href="{{ route('admin.banner.delete', $args)}}" class="btn btn-warning text-white"><i class="far fa-trash-alt"></i></a>
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

{{-- @section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#product-table').DataTable();
    });
</script>
@endsection --}}
