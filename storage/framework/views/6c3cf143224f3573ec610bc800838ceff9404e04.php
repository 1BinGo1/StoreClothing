<?php $__env->startSection('main'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card mt-4 mb-4">
                <div class="card-body error">
                    <img src="<?php echo e(asset('storage/app/404.jpg')); ?>" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Programs\OpenServer\OSPanel\domains\storeclothing\resources\views/errors/404.blade.php ENDPATH**/ ?>