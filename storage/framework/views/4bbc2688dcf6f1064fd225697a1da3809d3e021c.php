<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($title ?? 'Страница сайта'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/product/index.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/product/products.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/product/show.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/404.css')); ?>">
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>

<div class="container">
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('breadcrumbs'); ?>
    <div class="main">
        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success alert-dismissible mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('main'); ?>
    </div>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH E:\Programs\OpenServer\OSPanel\domains\storeclothing\resources\views/layouts/site.blade.php ENDPATH**/ ?>