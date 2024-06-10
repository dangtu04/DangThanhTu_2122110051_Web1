@extends('layouts.admin')
@section('title', 'Quản lý sản phẩm')
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
            <li class="breadcrumb-item active">Quản lý sản phẩm</li>
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
                <a href="{{ route('admin.product.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Thêm sản phẩm</a>
                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
              </div>
            </div>
        </div>
        <div class="card-body">
          @includeIf('components.message')
            <table id="product-table" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                      <th style="width: 30px">#</th> 
                      <th style="width: 150px">Hình ảnh</th>                                       
                      <th>Tên sản phẩm</th>   
                      <th>Danh mục</th>
                      <th>Thương hiệu</th>
                      <th>Giá</th>
                      <th style="width: 270px">Hành động</th>
                      <th style="width: 30px">ID</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($list as $row)
                    <tr>
                      <td class="text-center"><input type="checkbox" style="width: 20px"></td>
                      <td class="text-center"><img src="{{ asset('images/products/'.$row->image) }}" 
                        style="width: 100px" alt="{{ $row->image }}"></td>
                      <td>{{$row->name}}</td>                  
                      <td>{{$row->categoryname}}</td>
                      <td>{{$row->brandname}}</td>
                      <td class="text-center">{{$row->price}}</td>
                      @php
                        $args = ['id' => $row->id];
                      @endphp
                      <td class="text-center">
                        @if($row->status == 1)
                          <a href="{{ route('admin.product.status', $args)}}" class="btn btn-success"><i class="fas fa-toggle-on"></i></a>
                         @else
                          <a href="{{ route('admin.product.status', $args)}}" class="btn btn-danger"><i class="fas fa-toggle-off"></i></a>
                        @endif 
                        <a href="{{ route('admin.product.show', $args)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('admin.product.edit', $args)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('admin.product.delete', $args)}}" class="btn btn-warning text-white"><i class="far fa-trash-alt"></i></a>
                      </td>
                   
                      <td class="text-center">{{$row->id}}</td>
                      
                    </tr>                    
                  @endforeach                  

                </tbody>
            </table>
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
