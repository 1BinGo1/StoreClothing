<?php $__env->startSection('breadcrumbs'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <h1>Личный кабинет</h1>
    <p>Добро пожаловать, <?php echo e(auth()->user()->name); ?></p>
    <p>Это личный кабинет постоянного покупателя нашего интернет-магазина.</p>
    <form action="<?php echo e(route('logout')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-primary">Выйти</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Programs\OpenServer\OSPanel\domains\storeclothing\resources\views/user/index.blade.php ENDPATH**/ ?>