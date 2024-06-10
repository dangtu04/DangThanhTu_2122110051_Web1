<?php $__env->startSection('title', 'Quản lý sản phẩm'); ?>
<?php $__env->startSection('content'); ?>
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
                <a href="<?php echo e(route('admin.product.create')); ?>" class="btn btn-success"><i class="fas fa-plus"></i> Thêm sản phẩm</a>
                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
              </div>
            </div>
        </div>
        <div class="card-body">
          <?php if ($__env->exists('components.message')) echo $__env->make('components.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                  <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td class="text-center"><input type="checkbox" style="width: 20px"></td>
                      <td class="text-center"><img src="<?php echo e(asset('images/products/'.$row->image)); ?>" 
                        style="width: 100px" alt="<?php echo e($row->image); ?>"></td>
                      <td><?php echo e($row->name); ?></td>                  
                      <td><?php echo e($row->categoryname); ?></td>
                      <td><?php echo e($row->brandname); ?></td>
                      <td class="text-center"><?php echo e($row->price); ?></td>
                      <?php
                        $args = ['id' => $row->id];
                      ?>
                      <td class="text-center">
                        <?php if($row->status == 1): ?>
                          <a href="<?php echo e(route('admin.product.status', $args)); ?>" class="btn btn-success"><i class="fas fa-toggle-on"></i></a>
                         <?php else: ?>
                          <a href="<?php echo e(route('admin.product.status', $args)); ?>" class="btn btn-danger"><i class="fas fa-toggle-off"></i></a>
                        <?php endif; ?> 
                        <a href="<?php echo e(route('admin.product.show', $args)); ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="<?php echo e(route('admin.product.edit', $args)); ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo e(route('admin.product.delete', $args)); ?>" class="btn btn-warning text-white"><i class="far fa-trash-alt"></i></a>
                      </td>
                   
                      <td class="text-center"><?php echo e($row->id); ?></td>
                      
                    </tr>                    
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  

                </tbody>
            </table>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\DangThanhTu_Laravel_W1\resources\views/backend/product/index.blade.php ENDPATH**/ ?>