<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('admin')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <div class="admin_actions">

        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <span class="nav-link section-link active" id="users-settings">Пользователи</span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link section-link" id="products-settings">Товары</span>
                    </li>
                    <li class="nav-item dropdown">
                            <span id="sections-title" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                  aria-haspopup="true" aria-expanded="false" v-pre>
                                Разделы сайта
                            </span>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="sections">
                            <span class="dropdown-item section-link" id="sections-settings">Секции</span>
                            <span class="dropdown-item section-link" id="categories-settings">Категории</span>
                            <span class="dropdown-item section-link" id="brands-settings">Бренды</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <div class="content active" id="users">
                    <h5 class="card-title">Список пользователей: </h5>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-user">
                        Создать нового пользователя
                    </button>
                    <br><br>
                    <?php echo $__env->make('admin.create_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>№</th>
                            <th>Логин</th>
                            <th>Email</th>
                            <th>Роль</th>
                        </tr>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->role->name); ?></td>
                                <td>
                                    <?php if($user->id != auth()->id()): ?>
                                        <form action="<?php echo e(route('admin.destroy', ['name' => 'user', 'id' => $user->id])); ?>"
                                              method="post" onsubmit="return confirm('Удалить данного пользователя?')" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                                <i class="fa fa-trash fa-2x text-danger"></i>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                    <span class="mx-0"></span>
                                    <form action="" method="post" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                            <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>

                <div class="content" id="products">
                    <h5 class="card-title">Список товаров: </h5>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-product">
                        Создать новый товар
                    </button>
                    <br><br>
                    <?php echo $__env->make('admin.create_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                            <th>Секция</th>
                            <th>Категория</th>
                            <th>Бренд</th>
                        </tr>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><a href="<?php echo e(route('products.show', ['id' => $product->id])); ?>"><?php echo e($product->title); ?></a></td>
                                <td><?php echo e($product->category->section->name); ?></td>
                                <td><?php echo e($product->category->title); ?></td>
                                <td><?php echo e($product->brand->title); ?></td>
                                <td>
                                    <form action="<?php echo e(route('admin.destroy', ['name' => 'product', 'id' => $product->id])); ?>"
                                          method="post" onsubmit="return confirm('Удалить данный товар?')" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                            <i class="fa fa-trash fa-2x text-danger"></i>
                                        </button>
                                    </form>
                                    <span class="mx-0"></span>
                                    <form action="" method="post" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                            <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>

                <div class="content" id="sections">
                    <h5 class="card-title">Список секций: </h5>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-section">
                        Создать новую секцию
                    </button>
                    <br><br>
                    <?php echo $__env->make('admin.create_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                        </tr>
                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($section->name); ?></td>
                                <td>
                                    <form action="<?php echo e(route('admin.destroy', ['name' => 'section', 'id' => $section->id])); ?>"
                                          method="post" onsubmit="return confirm('Удалить данную секцию?')" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                            <i class="fa fa-trash fa-2x text-danger"></i>
                                        </button>
                                    </form>
                                    <span class="mx-0"></span>
                                    <form action="" method="post" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                            <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>

                <div class="content" id="categories">
                    <h5 class="card-title">Список категорий: </h5>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-category">
                        Создать новую категорию
                    </button>
                    <br><br>
                    <?php echo $__env->make('admin.create_category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>№</th>
                            <th>Секция</th>
                            <th>Название</th>
                        </tr>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($category->section->name); ?></td>
                                <td><?php echo e($category->title); ?></td>
                                <td>
                                    <form action="<?php echo e(route('admin.destroy', ['name' => 'category', 'id' => $category->id])); ?>"
                                          method="post" onsubmit="return confirm('Удалить данную категорию?')" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                            <i class="fa fa-trash fa-2x text-danger"></i>
                                        </button>
                                    </form>
                                    <span class="mx-0"></span>
                                    <form action="" method="post" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                            <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>

                <div class="content" id="brands">
                    <h5 class="card-title">Список брендов: </h5>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-brand">
                        Создать новый бренд
                    </button>
                    <br><br>
                    <?php echo $__env->make('admin.create_brand', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                            <th>Логотип</th>
                        </tr>
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($brand->title); ?></td>
                                <td><img src="<?php echo e($brand->img); ?>" alt="Image"></td>
                                <td>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-dark btn-block" data-toggle="modal" data-target="#modal-edit-brand">Редактировать</button>
                                    </div>
                                    <div class="form-group">
                                        <form action="<?php echo e(route('admin.destroy', ['name' => 'brand', 'id' => $brand->id])); ?>"
                                              method="post" onsubmit="return confirm('Удалить данный бренд?')" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="button" class="btn btn-danger btn-block">Удалить</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/admin.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
     <script src="<?php echo e(asset('js/admin/admin.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Programs\OpenServer\OSPanel\domains\storeclothing\resources\views/admin/index.blade.php ENDPATH**/ ?>