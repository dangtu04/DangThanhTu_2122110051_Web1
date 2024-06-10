<?php $__env->startSection('title', 'Sản phẩm'); ?>
<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Breadcrumb start -->
    <section class="breadcrumb container my-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html" class="text-main">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tất cả sản phẩm</li>
            </ol>
        </nav>
    </section>
    <!-- Breadcrumb end -->

    <!-- Product start -->
    <section class="product my-3">
      <div class="container">
        <div class="row">

          <?php if (isset($component)) { $__componentOriginal4ae7412eefb580631ed5b2b76b67be04 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ae7412eefb580631ed5b2b76b67be04 = $attributes; } ?>
<?php $component = App\View\Components\CardProduct::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\CardProduct::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ae7412eefb580631ed5b2b76b67be04)): ?>
<?php $attributes = $__attributesOriginal4ae7412eefb580631ed5b2b76b67be04; ?>
<?php unset($__attributesOriginal4ae7412eefb580631ed5b2b76b67be04); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ae7412eefb580631ed5b2b76b67be04)): ?>
<?php $component = $__componentOriginal4ae7412eefb580631ed5b2b76b67be04; ?>
<?php unset($__componentOriginal4ae7412eefb580631ed5b2b76b67be04); ?>
<?php endif; ?>
          <?php if (isset($component)) { $__componentOriginal4ae7412eefb580631ed5b2b76b67be04 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ae7412eefb580631ed5b2b76b67be04 = $attributes; } ?>
<?php $component = App\View\Components\CardProduct::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\CardProduct::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ae7412eefb580631ed5b2b76b67be04)): ?>
<?php $attributes = $__attributesOriginal4ae7412eefb580631ed5b2b76b67be04; ?>
<?php unset($__attributesOriginal4ae7412eefb580631ed5b2b76b67be04); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ae7412eefb580631ed5b2b76b67be04)): ?>
<?php $component = $__componentOriginal4ae7412eefb580631ed5b2b76b67be04; ?>
<?php unset($__componentOriginal4ae7412eefb580631ed5b2b76b67be04); ?>
<?php endif; ?>
          <?php if (isset($component)) { $__componentOriginal4ae7412eefb580631ed5b2b76b67be04 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ae7412eefb580631ed5b2b76b67be04 = $attributes; } ?>
<?php $component = App\View\Components\CardProduct::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\CardProduct::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ae7412eefb580631ed5b2b76b67be04)): ?>
<?php $attributes = $__attributesOriginal4ae7412eefb580631ed5b2b76b67be04; ?>
<?php unset($__attributesOriginal4ae7412eefb580631ed5b2b76b67be04); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ae7412eefb580631ed5b2b76b67be04)): ?>
<?php $component = $__componentOriginal4ae7412eefb580631ed5b2b76b67be04; ?>
<?php unset($__componentOriginal4ae7412eefb580631ed5b2b76b67be04); ?>
<?php endif; ?>
          <?php if (isset($component)) { $__componentOriginal4ae7412eefb580631ed5b2b76b67be04 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ae7412eefb580631ed5b2b76b67be04 = $attributes; } ?>
<?php $component = App\View\Components\CardProduct::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\CardProduct::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ae7412eefb580631ed5b2b76b67be04)): ?>
<?php $attributes = $__attributesOriginal4ae7412eefb580631ed5b2b76b67be04; ?>
<?php unset($__attributesOriginal4ae7412eefb580631ed5b2b76b67be04); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ae7412eefb580631ed5b2b76b67be04)): ?>
<?php $component = $__componentOriginal4ae7412eefb580631ed5b2b76b67be04; ?>
<?php unset($__componentOriginal4ae7412eefb580631ed5b2b76b67be04); ?>
<?php endif; ?>
          <?php if (isset($component)) { $__componentOriginal4ae7412eefb580631ed5b2b76b67be04 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ae7412eefb580631ed5b2b76b67be04 = $attributes; } ?>
<?php $component = App\View\Components\CardProduct::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\CardProduct::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ae7412eefb580631ed5b2b76b67be04)): ?>
<?php $attributes = $__attributesOriginal4ae7412eefb580631ed5b2b76b67be04; ?>
<?php unset($__attributesOriginal4ae7412eefb580631ed5b2b76b67be04); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ae7412eefb580631ed5b2b76b67be04)): ?>
<?php $component = $__componentOriginal4ae7412eefb580631ed5b2b76b67be04; ?>
<?php unset($__componentOriginal4ae7412eefb580631ed5b2b76b67be04); ?>
<?php endif; ?>
          <?php if (isset($component)) { $__componentOriginal4ae7412eefb580631ed5b2b76b67be04 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ae7412eefb580631ed5b2b76b67be04 = $attributes; } ?>
<?php $component = App\View\Components\CardProduct::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\CardProduct::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ae7412eefb580631ed5b2b76b67be04)): ?>
<?php $attributes = $__attributesOriginal4ae7412eefb580631ed5b2b76b67be04; ?>
<?php unset($__attributesOriginal4ae7412eefb580631ed5b2b76b67be04); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ae7412eefb580631ed5b2b76b67be04)): ?>
<?php $component = $__componentOriginal4ae7412eefb580631ed5b2b76b67be04; ?>
<?php unset($__componentOriginal4ae7412eefb580631ed5b2b76b67be04); ?>
<?php endif; ?>
          <?php if (isset($component)) { $__componentOriginal4ae7412eefb580631ed5b2b76b67be04 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ae7412eefb580631ed5b2b76b67be04 = $attributes; } ?>
<?php $component = App\View\Components\CardProduct::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\CardProduct::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ae7412eefb580631ed5b2b76b67be04)): ?>
<?php $attributes = $__attributesOriginal4ae7412eefb580631ed5b2b76b67be04; ?>
<?php unset($__attributesOriginal4ae7412eefb580631ed5b2b76b67be04); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ae7412eefb580631ed5b2b76b67be04)): ?>
<?php $component = $__componentOriginal4ae7412eefb580631ed5b2b76b67be04; ?>
<?php unset($__componentOriginal4ae7412eefb580631ed5b2b76b67be04); ?>
<?php endif; ?>
          <?php if (isset($component)) { $__componentOriginal4ae7412eefb580631ed5b2b76b67be04 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ae7412eefb580631ed5b2b76b67be04 = $attributes; } ?>
<?php $component = App\View\Components\CardProduct::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\CardProduct::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ae7412eefb580631ed5b2b76b67be04)): ?>
<?php $attributes = $__attributesOriginal4ae7412eefb580631ed5b2b76b67be04; ?>
<?php unset($__attributesOriginal4ae7412eefb580631ed5b2b76b67be04); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ae7412eefb580631ed5b2b76b67be04)): ?>
<?php $component = $__componentOriginal4ae7412eefb580631ed5b2b76b67be04; ?>
<?php unset($__componentOriginal4ae7412eefb580631ed5b2b76b67be04); ?>
<?php endif; ?>
          <?php if (isset($component)) { $__componentOriginal4ae7412eefb580631ed5b2b76b67be04 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ae7412eefb580631ed5b2b76b67be04 = $attributes; } ?>
<?php $component = App\View\Components\CardProduct::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\CardProduct::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ae7412eefb580631ed5b2b76b67be04)): ?>
<?php $attributes = $__attributesOriginal4ae7412eefb580631ed5b2b76b67be04; ?>
<?php unset($__attributesOriginal4ae7412eefb580631ed5b2b76b67be04); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ae7412eefb580631ed5b2b76b67be04)): ?>
<?php $component = $__componentOriginal4ae7412eefb580631ed5b2b76b67be04; ?>
<?php unset($__componentOriginal4ae7412eefb580631ed5b2b76b67be04); ?>
<?php endif; ?>          

        </div>
      </div>
    </section>
    <!-- Product end -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\DangThanhTu_Laravel_W1\resources\views/frontend/product.blade.php ENDPATH**/ ?>