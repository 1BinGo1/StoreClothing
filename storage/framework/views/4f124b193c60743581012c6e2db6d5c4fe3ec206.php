<?php $__env->startSection('breadcrumbs'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <div class="row show">
        <div class="col-12">
            <div class="card mt-4 mb-4">

                <div class="card-header">
                    <h1><?php echo e($product->title); ?></h1>
                    <div class="card-header-category">
                        <p>Категория: <?php echo e($product->category->title); ?> <?php if(!empty($product->brand->img)): ?> <img src="<?php echo e(asset($product->brand->img)); ?>" alt="Image"> <?php endif; ?> </p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body-img">
                        <img src="<?php echo e($product->img ?? asset('storage/app/Default.png')); ?>" alt="Image" class="img-fluid">
                    </div>
                    <div class="card-body-text">
                        <p class="mt-3 mb-0"><?php echo e($product->text); ?></p>
                    </div>
                    <br>
                    <div class="card-body-price">
                        <p>Цена: <?php echo e(number_format($product->price, 2, '.', '')); ?> руб.</p>
                    </div>
                    <div class="card-body-add">
                        <form action="<?php echo e(route('basket.add', ['id' => $product->id])); ?>" method="post" class="form-inline">
                            <?php echo csrf_field(); ?>
                            <label for="input-quantity">Количество</label>
                            <input type="text" name="quantity" id="input-quantity" value="1"
                                   class="form-control mx-2 w-25">
                            <button type="submit" class="btn btn-success">Добавить в корзину</button>
                        </form>
                    </div>
                    <br>
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->id() == $product->user_id || Auth::id() == 2): ?>
                            <div class="card-body-settings float-left">
                                <div class="card-body-edit">
                                    <a href="<?php echo e(route('products.edit', ['id' => $product->id])); ?>" class="btn btn-dark">Редактировать</a>
                                </div>
                                <div class="card-body-delete">
                                    <form action="<?php echo e(route('products.destroy', ['id' => $product->id])); ?>"
                                          method="post" onsubmit="return confirm('Удалить этот пост?')" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <input type="submit" class="btn btn-danger" value="Удалить">
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Programs\OpenServer\OSPanel\domains\storeclothing\resources\views/product/show.blade.php ENDPATH**/ ?>