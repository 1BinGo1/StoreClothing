<?php $__env->startSection('main'); ?>
    <h1>Корзина</h1>
    <?php if(count($basket->products)): ?>
        <?php
            $basketCost = 0;
        ?>
        <table class="table table-bordered">
            <tr>
                <th>№</th>
                <th>Наименование</th>
                <th>Цена</th>
                <th>Кол-во</th>
                <th>Стоимость</th>
            </tr>
            <?php $__currentLoopData = $basket->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $itemPrice = $product->price;
                    $itemQuantity =  $product->pivot->quantity;
                    $itemCost = $itemPrice * $itemQuantity;
                    $basketCost = $basketCost + $itemCost;
                ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td>
                        <a href="<?php echo e(route('products.show', [$product->id])); ?>"><?php echo e($product->title ?? 'Название товара'); ?></a>
                    </td>
                    <td><?php echo e(number_format($itemPrice, 2, '.', '')); ?></td>
                    <td>
                        <form action="<?php echo e(route('basket.minus', ['id' => $product->id])); ?>"
                              method="post" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="fa fa-minus-square fa-2x"></i>
                            </button>
                        </form>
                        <span class="mx-1"><?php echo e($itemQuantity); ?></span>
                        <form action="<?php echo e(route('basket.plus', ['id' => $product->id])); ?>"
                              method="post" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="fa fa-plus-square fa-2x"></i>
                            </button>
                        </form>
                    </td>
                    <td><?php echo e(number_format($itemCost, 2, '.', '')); ?></td>
                    <td>
                        <form action="<?php echo e(route('basket.clear', ['id' => $product->id])); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="fa fa-trash fa-2x text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th colspan="4" class="text-right">Итого</th>
                <th><?php echo e(number_format($basketCost, 2, '.', '')); ?></th>
            </tr>
        </table>
    <?php else: ?>
        <p>Ваша корзина пуста</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Programs\OpenServer\OSPanel\domains\storeclothing\resources\views/basket/index.blade.php ENDPATH**/ ?>