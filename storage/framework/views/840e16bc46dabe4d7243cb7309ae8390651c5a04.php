<div class="modal fade" id="modal-create-category" tabindex="-1" role="dialog" aria-labelledby="modal-create-category" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Создание новой категории</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('admin.create-category')); ?>" method="post" id="form-create-category" novalidate>
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label class="mr-sm-2" for="category-section">Section</label>
                        <?php
                            $sections = \App\Models\Section::all();
                        ?>
                        <select class="form-control form-control-lg" name="section" id="category-section">
                            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($section->id); ?>" <?php if(!empty(old('section'))): ?> <?php if(old('section') == $section->id): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($section->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category-name">Name</label>
                        <input type="text" class="form-control" name="name" id="category-name" placeholder="Name" value="<?php echo e(old('name') ?? ''); ?>">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="create">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\Programs\OpenServer\OSPanel\domains\storeclothing\resources\views/admin/create_category.blade.php ENDPATH**/ ?>