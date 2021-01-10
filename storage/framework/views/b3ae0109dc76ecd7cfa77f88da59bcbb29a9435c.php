<div class="modal fade" id="modal-create-product" tabindex="-1" role="dialog" aria-labelledby="modal-create-product" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Создание нового товара</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('admin.create-product')); ?>" method="post" enctype="multipart/form-data" novalidate id="form-create-product">
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group">
                        <label class="mr-sm-2" for="product-category">Category</label>
                        <select class="form-control form-control-lg" name="category" id="product-category">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" <?php if(!empty(old('category'))): ?> <?php if(old('category') == $category->id): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($category->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="mr-sm-2" for="product-brand">Brand</label>
                        <select class="form-control form-control-lg" name="brand" id="product-brand">
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($brand->id); ?>" <?php if(!empty(old('brand'))): ?> <?php if(old('brand') == $brand->id): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($brand->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product-title">Title</label>
                        <input type="text" name="title" class="form-control" id="product-title" placeholder="Title" value="<?php echo e(old('title') ?? ''); ?>">
                    </div>
                    <div class="form-group">
                        <label for="product-excerpt">Excerpt</label>
                        <textarea class="form-control" name="excerpt" id="product-excerpt" placeholder="Excerpt" rows="7"><?php echo e(old('excerpt') ?? ''); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="product-price">Price</label>
                        <input type="text" name="price" class="form-control" id="product-price" placeholder="Price" value="<?php echo e(old('price') ?? ''); ?>">
                    </div>
                    <div class="form-group">
                        <label for="product-image">Image</label>
                        <input type="file" name="image" class="form-control-file" id="product-image">
                    </div>
                    <div class="form-group">
                        <label for="product-body">Body</label>
                        <textarea class="form-control" name="body" id="product-body" placeholder="Body" rows="7"><?php echo e(old('body') ?? ''); ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="create-product">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<?php /**PATH E:\Programs\OpenServer\OSPanel\domains\storeclothing\resources\views/admin/create_product.blade.php ENDPATH**/ ?>