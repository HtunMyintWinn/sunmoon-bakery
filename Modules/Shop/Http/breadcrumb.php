<?php

Breadcrumbs::register('admin.shop.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('shop::menus.backend.shop.management'), route('admin.shop.index'));
});

Breadcrumbs::register('admin.shop.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.shop.index');
    $breadcrumbs->push(trans('shop::menus.backend.shop.create'), route('admin.shop.create'));
});

Breadcrumbs::register('admin.shop.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.shop.index');
    $breadcrumbs->push(trans('shop::menus.backend.shop.edit'), route('admin.shop.edit', $id));
});
