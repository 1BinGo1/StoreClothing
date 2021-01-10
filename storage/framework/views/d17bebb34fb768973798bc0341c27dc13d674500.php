<?php $__env->startSection('main'); ?>
    <h1 class="mt-2 mb-3">Результаты поиска</h1>
    <div class="products">
        <?php if(isset($products) && count($products)): ?>
            <div class="row">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 mb-4">
                        <div class="product">
                            <div class="card">
                                <div class="card-header">
                                    <h3><?php echo e($product->title ?? 'Название товара'); ?></h3>
                                    <div class="card-header-category">
                                        <p>Категория: <?php echo e($product->category->title); ?> <?php if(!empty($product->brand->img)): ?> <img src="<?php echo e(asset($product->brand->img)); ?>" alt="Image"> <?php endif; ?> </p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-body-img">
                                        <img src="<?php echo e($product->img ?? asset('storage/products/Default.png')); ?>" alt="Image" class="img-fluid">
                                    </div>
                                    <div class="card-body-excerpt">
                                        <p class="mt-3 mb-0"><?php echo e($product->excerpt ?? 'Краткое описание'); ?></p>
                                    </div>
                                    <div class="card-body-detail">
                                        <a href="<?php echo e(route('products.show', ['id' => $product->id])); ?>" class="btn btn-dark">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
    </div>
    <?php else: ?>
        <p>По вашему запросу ничего не найдено</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Programs\OpenServer\OSPanel\domains\storeclothing\resources\views/product/search.blade.php ENDPATH**/ ?>