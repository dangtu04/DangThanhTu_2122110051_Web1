<?php $__env->startSection('title', 'Quản lý sản phẩm'); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý menu</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Quản lý menu</li>
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
            <form action="<?php echo e(route('admin.menu.store')); ?>" method="post">
              <?php echo csrf_field(); ?>
                <div class="accordion" id="accordionExample">
                    <div class="card p-3">
                        <label for="position">Vị trí</label>
                        <select name="position" id="position" class="form-control">
                            <option value="mainmenu">Main Menu</option>
                            <option value="footermenu">Footer Menu</option>
                        </select>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingCategory">
                            <a class="d-block" data-toggle="collapse"
                                data-target="#collapseCategory" aria-expanded="true"
                                aria-controls="collapseCategory">
                                Danh mục
                            </a>
                        </div>
                        <div id="collapseCategory" class="collapse"
                            aria-labelledby="headingCategory" data-parent="#accordionExample">
                            <div class="card-body">
                              <?php $__currentLoopData = $list_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check mb-2">
                                  <input class="form-check-input" name="categoryid[<?php echo e($category->id); ?>]" type="checkbox" value="category<?php echo e($category->id); ?>" id="category<?php echo e($category->id); ?>">
                                  <label class="form-check-label" for="category<?php echo e($category->id); ?>">
                                   <?php echo e($category->name); ?>

                                  </label>
                                </div>                                  
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="mb-3">
                                    <input type="submit" name="createCategory" class="btn btn-success" value="Thêm menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                    <div class="card">
                        <div class="card-header" id="headingBrand">
                            <a class="d-block" data-toggle="collapse"
                                data-target="#collapseBrand" aria-expanded="true"
                                aria-controls="collapseBrand">
                                Thương hiệu
                            </a>
                        </div>
                        <div id="collapseBrand" class="collapse"
                            aria-labelledby="headingBrand" data-parent="#accordionExample">
                            <div class="card-body">
                                    <?php $__currentLoopData = $list_brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <div class="form-check mb-2">
                                        <input class="form-check-input" name="brandid[<?php echo e($brand->id); ?>]" type="checkbox" value="brand<?php echo e($brand->id); ?>" id="brand<?php echo e($brand->id); ?>">
                                        <label class="form-check-label" for="brand<?php echo e($brand->id); ?>">
                                        <?php echo e($brand->name); ?>

                                        </label>
                                      </div>                                  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="mb-3">
                                  <input type="submit" name="createBrand" class="btn btn-success" value="Thêm menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                    <div class="card">
                        <div class="card-header" id="headingTopic">
                            <a class="d-block" data-toggle="collapse"
                                data-target="#collapseTopic" aria-expanded="true"
                                aria-controls="collapseTopic">
                               Chủ đề
                            </a>
                        </div>
                        <div id="collapseTopic" class="collapse"
                            aria-labelledby="headingTopic" data-parent="#accordionExample">
                            <div class="card-body">
                                <?php $__currentLoopData = $list_topic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check mb-2">
                                      <input class="form-check-input" name="topicid[<?php echo e($topic->id); ?>]" type="checkbox" value="topic<?php echo e($topic->id); ?>" id="topic<?php echo e($topic->id); ?>">
                                      <label class="form-check-label" for="topic<?php echo e($topic->id); ?>">
                                      <?php echo e($topic->name); ?>

                                      </label>
                                    </div>                                  
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="mb-3">
                                  <input type="submit" name="createTopic" class="btn btn-success" value="Thêm menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                    <div class="card">
                        <div class="card-header" id="headingPage">
                            <a class="d-block" data-toggle="collapse"
                                data-target="#collapsePage" aria-expanded="true"
                                aria-controls="collapsePage">
                                Trang đơn
                            </a>
                        </div>
                        <div id="collapsePage" class="collapse"
                            aria-labelledby="headingPage" data-parent="#accordionExample">
                            <div class="card-body">
                                <?php $__currentLoopData = $list_page; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <div class="form-check mb-2">
                                    <input class="form-check-input" name="pageid[<?php echo e($page->id); ?>]" type="checkbox" value="page<?php echo e($page->id); ?>" id="page<?php echo e($page->id); ?>">
                                    <label class="form-check-label" for="page<?php echo e($page->id); ?>">
                                    <?php echo e($page->title); ?>

                                    </label>
                                  </div>                                  
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="mb-3">
                                  <input type="submit" name="createPage" class="btn btn-success" value="Thêm menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                    <div class="card">
                        <div class="card-header" id="headingCustom">
                            <a class="d-block" data-toggle="collapse"
                                data-target="#collapseCustom" aria-expanded="true"
                                aria-controls="collapseCustom">
                                Tùy liên kết
                            </a>
                        </div>
                        <div id="collapseCustom" class="collapse"
                            aria-labelledby="headingCustom" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name">Tên menu</label>
                                    <input type="text" value="" name="name" id="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="link">Liên kết</label>
                                    <input type="text" value="" name="link" id="link" class="form-control">
                                </div>
                                <div class="mb-3">
                                  <input type="submit" name="createCustom" class="btn btn-success" value="Thêm menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                    <div class="card p-3">
                        <label for="status">Trạng thái</label>
                        <select name="status" id="status" class="form-control">
                            <option value="2">Chưa xuất bản</option>
                            <option value="1">Xuất bản</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
          <div class="col-md-9">
            <table class="table table-bordered">
              <thead>
                <tr class="text-center">
                  <th style="width: 30px">#</th> 
                  <th>Tên menu</th>
                  <th>Menu cha</th>
                  <th>Link</th>
                  <th>Kiểu menu</th>
                  <th>Vị trí</th>
                  <th style="width: 270px">Hành động</th>
                  <th style="width: 30px">ID</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td class="text-center"><input type="checkbox" style="width: 20px"></td>
                  <td><?php echo e($row->name); ?></td>                  
                  <td><?php echo e($row->parent_id); ?></td>
                  <td><?php echo e($row->link); ?></td>     
                  <td><?php echo e($row->type); ?></td> 
                  <td><?php echo e($row->position); ?></td>             
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





<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\DangThanhTu_Laravel_W1\resources\views/backend/menu/index.blade.php ENDPATH**/ ?>