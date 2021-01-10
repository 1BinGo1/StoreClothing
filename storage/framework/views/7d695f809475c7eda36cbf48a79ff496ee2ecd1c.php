<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('section')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <div class="categories">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="category">

                <div class="products">
                    <h1><?php echo e($category->title); ?></h1>
                    <div class="row">
                        <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-6 mb-4">
                                <div class="product">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3><?php echo e($product->title ?? 'Название товара'); ?></h3>
                                            <div class="card-header-category">
                                                <p>Брэнд: <?php echo e($product->brand->title); ?> <?php if(!empty($product->brand->img)): ?> <img src="<?php echo e(asset($product->brand->img)); ?>" alt="Image"> <?php endif; ?> </p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-body-img">
                                                <img src="<?php echo e($product->img ?? asset('storage/app/Default.png')); ?>" alt="Image" class="img-fluid">
                                            </div>
                                            <div class="card-body-excerpt">
                                                <p class="mt-3 mb-0"><?php echo e($product->excerpt ?? 'Краткое описание'); ?></p>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="<?php echo e(route('products.show', ['id' => $product->id])); ?>" class="btn btn-dark">Подробнее</a>
                                            <form action="<?php echo e(route('basket.add', ['id' => $product->id])); ?>"
                                                  method="post" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-success">Добавить в корзину</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Programs\OpenServer\OSPanel\domains\storeclothing\resources\views/product/index.blade.php ENDPATH**/ ?>