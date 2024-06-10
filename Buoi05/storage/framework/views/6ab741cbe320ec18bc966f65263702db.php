<?php $__env->startSection('title', 'Quản lý sản phẩm'); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý chủ đề</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Quản lý chủ đề</li>
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
        <div class="row">
          <div class="col-md-3">
            <form action="<?php echo e(route('admin.topic.store')); ?>" method="post" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>  
              <div class="mb-3">
                    <label for="name">Tên chủ đề</label>
                    <input type="text" value="<?php echo e(old('name')); ?>" name="name" id="name" class="form-control">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="mb-3">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description" class="form-control"><?php echo e(old('description')); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="sort_order">Sắp xếp</label>
                    <select name="sort_order" id="sort_order" class="form-control">
                        <option value="0">None</option>
                        <?php echo $htmlsortorder; ?>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="2">Chưa xuất bản</option>
                        <option value="1">Xuất bản</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" name="create" class="btn btn-success">Thêm danh
                        mục</button>
                </div>
            </form>
        </div>
           <div class="col-md-9">
              <table class="table table-bordered">
                <thead>
                  <tr class="text-center">
                    <th style="width: 30px">#</th> 
                    <th>Tên chủ đề</th>
                    <th>Slug</th>
                    <th>Mô tả</th>
                    <th style="width: 270px">Chức năng</th>
                    <th style="width: 30px">ID</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td class="text-center"><input type="checkbox" style="width: 20px"></td>
                    <td><?php echo e($row->name); ?></td> 
                    <td><?php echo e($row->slug); ?></td>  
                    <td><?php echo e($row->description); ?></td>               
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
     </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\DangThanhTu_Laravel_W1\resources\views/backend/topic/index.blade.php ENDPATH**/ ?>