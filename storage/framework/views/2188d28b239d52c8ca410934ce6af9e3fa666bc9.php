<header>
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo e(route('products.home')); ?>"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
                </li>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->role_id == 1): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('office.index')); ?>"><i class="fa fa-wrench fa-2x" aria-hidden="true"></i></a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <li class="nav-item dropdown">
                    <a id="navbarDropdownCatalog" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" v-pre>
                        Каталог
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownCatalog">
                        <?php
                            $sections =\App\Models\Section::all();
                        ?>
                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="dropdown-item" href="<?php echo e(route('products.index', ['title' => __('messages.' . $section->name)])); ?>"><?php echo e($section->name); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Доставка</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Контакты</a>
                </li>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->id()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('basket.index')); ?>">Корзина</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="<?php echo e(route('products.search')); ?>">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Поиск..." aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="send_search">Поиск...</button>
            </form>
            <ul class="navbar-nav ml-auto">
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                    </li>
                    <?php if(Route::has('register')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" v-pre>
                            <?php echo e(auth()->user()->name); ?>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                            <a class="dropdown-item" href="<?php echo e(route('user.index')); ?>">Личный кабинет</a>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                            </a>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>
<?php /**PATH E:\Programs\OpenServer\OSPanel\domains\storeclothing\resources\views/layouts/header.blade.php ENDPATH**/ ?>