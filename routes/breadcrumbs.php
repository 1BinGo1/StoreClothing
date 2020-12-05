<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Главная', route('products.home'));
});

Breadcrumbs::for('section', function ($trail) {
    $trail->parent('home');
    $trail->push('Каталог');
});

Breadcrumbs::for('admin', function ($trail) {
    $trail->parent('home');
    $trail->push('Администрирование', route('admin.index'));
});

Breadcrumbs::for('admin.create', function ($trail) {
    $trail->parent('home');
    $trail->parent('admin');
    $trail->push('Создание нового товара', route('admin.index'));
});
