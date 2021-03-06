<?php

Breadcrumbs::register('admin.product.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('product::menus.backend.product.management'), route('admin.product.index'));
});

Breadcrumbs::register('admin.product.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.product.index');
    $breadcrumbs->push(trans('product::menus.backend.product.create'), route('admin.product.create'));
});

Breadcrumbs::register('admin.product.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.product.index');
    $breadcrumbs->push(trans('product::menus.backend.product.edit'), route('admin.product.edit', $id));
});
