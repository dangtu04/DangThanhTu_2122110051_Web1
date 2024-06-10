<?php $__env->startSection('title', 'Quản lý người dùng'); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý người dùng</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Quản lý người dùng</li>
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
          <?php if ($__env->exists('components.message')) echo $__env->make('components.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <table id="contact-table" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                      <th style="width: 30px">#</th>                                                       
                      <th>Tên người dùng</th>
                      <th>Tên đăng nhập</th>
                      <th>Email</th>
                      <th>Số điện thoại</th>
                      <th>Địa chỉ</th>
                      <th>Vai trò</th>
                      <th style="width: 270px">Hành động</th>
                      <th style="width: 30px">ID</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td class="text-center"><input type="checkbox" style="width: 20px"></td>
                     <td><?php echo e($row->name); ?></td>                  
                      <td><?php echo e($row->username); ?></td>
                      <td><?php echo e($row->email); ?></td>
                      <td><?php echo e($row->phone); ?></td>
                      <td><?php echo e($row->address); ?></td>
                      <td><?php echo e($row->roles); ?></td>
                      <?php
                        $args = ['id' => $row->id];
                      ?>
                     <td class="text-center">
                      <?php if($row->status == 1): ?>
                        <a href="<?php echo e(route('admin.user.status', $args)); ?>" class="btn btn-success"><i class="fas fa-toggle-on"></i></a>
                       <?php else: ?>
                        <a href="<?php echo e(route('admin.user.status', $args)); ?>" class="btn btn-danger"><i class="fas fa-toggle-off"></i></a>
                      <?php endif; ?> 
                      <a href="<?php echo e(route('admin.user.show', $args)); ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                      <a href="<?php echo e(route('admin.user.edit', $args)); ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                      <a href="<?php echo e(route('admin.user.delete', $args)); ?>" class="btn btn-warning text-white"><i class="far fa-trash-alt"></i></a>
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



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\DangThanhTu_Laravel_W1\resources\views/backend/user/index.blade.php ENDPATH**/ ?>