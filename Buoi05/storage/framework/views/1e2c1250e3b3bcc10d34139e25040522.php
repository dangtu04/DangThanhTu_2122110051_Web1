<?php if(session('message')): ?>
    <?php
    $arrMessage = session('message');
    ?>
    <div class="alert alert-<?php echo e($arrMessage['type']); ?> alert-dismissible fade show" role="alert">
        <strong>Thông báo</strong> <?php echo e($arrMessage['msg']); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>    
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\DangThanhTu_Laravel_W1\resources\views/components/message.blade.php ENDPATH**/ ?>