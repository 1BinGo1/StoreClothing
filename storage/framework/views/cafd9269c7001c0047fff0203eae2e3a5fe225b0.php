<?php
    use Illuminate\Support\Facades\Route;
    $route = Route::getRoutes();
?>
<?php echo e($route); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('products.home')); ?>">Главная</a></li>
        <li class="breadcrumb-item active" aria-current="page">Library</li>
    </ol>
</nav>
<?php /**PATH E:\Programs\OpenServer\OSPanel\domains\storeclothing\resources\views/layouts/crumbs.blade.php ENDPATH**/ ?>