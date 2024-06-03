@extends('layouts.admin')
@section('title', 'Quản lý sản phẩm')
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
            <li class="breadcrumb-item active">Quản lý danh mục</li>
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
                 <label>Tên danh mục (*)</label>
                 <input type="text" name="name" id="name" placeholder="Nhập tên danh mục" class="form-control"
                    onkeydown="handle_slug(this.value);">
              </div>
              <div class="mb-3">
                 <label>Slug</label>
                 <input type="text" name="slug" id="slug" placeholder="Nhập slug" class="form-control">
              </div>
              <div class="mb-3">
                 <label>Danh mục cha (*)</label>
                 <select name="parent_id" class="form-control">
                    <option value="">None</option>
                    <option value="1">Tên danh mục</option>
                 </select>
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
                <a class="btn btn-success"><i class="fas fa-plus"></i> Thêm danh mục</a>
              </div>
           </div>
           <div class="col-md-9">
              <table class="table table-bordered">
                <thead>
                  <tr class="text-center">
                    <th style="width: 30px">#</th> 
                    <th style="width: 150px">Hình ảnh</th> 
                    <th>Tên danh mục</th>
                    <th>Danh mục cha</th>
                    <th>Slug</th>
                    <th style="width: 270px">Hành động</th>
                    <th style="width: 30px">ID</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($list as $row)
                  <tr>
                    <td class="text-center"><input type="checkbox" style="width: 20px"></td>
                    <td class="text-center"><img src="{{ asset('image/categories/'.$row->image) }}" 
                      style="width: 100px" alt="{{ $row->image }}"></td>
                    <td>{{$row->name}}</td>                  
                    <td>{{$row->parent_id}}</td>
                    <td>{{$row->slug}}</td>                 
                    @php
                      $args = ['id' => $row->id];
                    @endphp
                    <td class="text-center">
                      <a href="{{ route('admin.category.status', $args)}}" class="btn btn-success"><i class="fas fa-toggle-on"></i></a>
                      <a href="{{ route('admin.category.status', $args)}}" class="btn btn-danger"><i class="fas fa-toggle-off"></i></a>
                      <a href="{{ route('admin.category.show', $args)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                      <a href="{{ route('admin.category.edit', $args)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                      <a href="{{ route('admin.category.delete', $args)}}" class="btn btn-warning text-white"><i class="far fa-trash-alt"></i></a>
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

{{-- <section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
              <div class="col-12 text-right">
                <a class="btn btn-success"><i class="fas fa-plus"></i> Thêm sản phẩm</a>
                <a class="btn btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
              </div>
            </div>
        </div>
        <div class="card-body">
            <table id="product-table" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                      <th style="width: 30px">#</th> 
                      <th style="width: 150px">Hình ảnh</th> 
                      <th>Tên danh mục</th>
                      <th>Giá</th>
                      <th style="width: 270px">Hành động</th>
                      <th style="width: 30px">ID</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td class="text-center"><input type="checkbox" style="width: 20px"></td>
                      <td class="text-center"><img src="{{ asset('image/nguyenvancut.jpg')}}" style="width: 100px" alt=""></td>
                      <td>Tên danh mục</td>
                      <td class="text-center">100,000</td>
                      <td class="text-center">
                        <a class="btn btn-success"><i class="fas fa-toggle-on"></i></a>
                        <a class="btn btn-danger"><i class="fas fa-toggle-off"></i></a>
                        <a class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-warning text-white"><i class="far fa-trash-alt"></i></a>
                      </td>
                      <td class="text-center">1</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</section> --}}
@endsection

{{-- @section('script')
<script>
  $(document).ready(function () {
     $('#mytable').DataTable();
  });
</script>
<script>
  function handle_slug(name) {
     document.querySelector("#slug").value = document.querySelector("#name").value;
  }
</script>
@endsection --}}

{{-- @section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#product-table').DataTable();
    });
</script>
@endsection --}}
