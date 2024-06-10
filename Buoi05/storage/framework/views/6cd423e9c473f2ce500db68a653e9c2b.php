<?php $__env->startSection('title', 'Thêm bài viết'); ?>
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('admin.post.store')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm bài viết</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <?php if ($__env->exists('components.message')) echo $__env->make('components.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" name="create" class="btn btn-sm btn-success">
                            <i class="fa fa-save"></i> Lưu
                        </button>
                        <a class="btn btn-sm btn-info" href="<?php echo e(route('admin.post.index')); ?>">
                            <i class="fa fa-arrow-left"></i> Về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label for="title">Tiêu đề</label>
                            <input type="text" value="<?php echo e(old('title')); ?>" name="title" id="title" class="form-control">
                            <?php $__errorArgs = ['title'];
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
                            <label for="detail">Chi tiết</label>
                            <textarea name="detail" id="detail" rows="8" class="form-control"><?php echo e(old('detail')); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="description">Mô tả</label>
                            <textarea name="description" id="description" class="form-control"><?php echo e(old('description')); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="topic_id">Chủ đề</label>
                            <select name="topic_id" id="topic_id" class="form-control">
                                <option value="">Chọn chủ đề</option>
                                <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($topic->id); ?>"><?php echo e($topic->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="type">Kiểu</label>
                            <select name="type" id="type" class="form-control">
                                <option value="post">Bài viết</option>
                                <option value="page">Trang đơn</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image">Hình</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <?php $__errorArgs = ['image'];
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
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="2">Chưa xuất bản</option>
                                <option value="1">Xuất bản</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\DangThanhTu_Laravel_W1\resources\views/backend/post/create.blade.php ENDPATH**/ ?>