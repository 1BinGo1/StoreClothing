<?php $__env->startSection('main'); ?>
    <div class="container">

        <form action="<?php echo e(route('products.edit', ['id' => $product->id])); ?>" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label class="mr-sm-2" for="category">Category</label>
                <select class="form-control form-control-lg" name="category" id="category" required>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty($category->title)): ?>
                            <option value="<?php echo e($category->id); ?>" <?php if($category->title === $product->category->title): ?> selected <?php endif; ?>><?php echo e(old('category') ?? $category->title); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label class="mr-sm-2" for="brand">Brand</label>
                <select class="form-control form-control-lg" name="brand" id="brand" required>
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty($brand->title)): ?>
                            <option value="<?php echo e($brand->id); ?>" <?php if($brand->title === $product->brand->title): ?> selected <?php endif; ?>><?php echo e(old('brand') ?? $brand->title); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" required value="<?php echo e(old('title') ?? $product->title ?? ''); ?>">
            </div>
            <div class="form-group">
                <label for="excerpt">Excerpt</label>
                <textarea class="form-control" name="excerpt" id="excerpt" placeholder="Excerpt" rows="7" required><?php echo e(old('excerpt') ?? $product->excerpt ?? ''); ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" id="price" placeholder="Price" required value="<?php echo e(old('price') ?? $product->price ?? ''); ?>">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control-file" id="image">
            </div>
            <?php if(isset($product->img)): ?>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="remove" id="remove">
                    <label class="form-check-label" for="remove">
                        Удалить загруженное <a href="<?php echo e($product->img); ?>" target="_blank">изображение</a>
                    </label>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" name="body" id="body" placeholder="Body" rows="7" required><?php echo e(old('body') ?? $product->text ?? ''); ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="edit">Edit</button>
            </div>
        </form>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Programs\OpenServer\OSPanel\domains\storeclothing\resources\views/admin/edit.blade.php ENDPATH**/ ?>