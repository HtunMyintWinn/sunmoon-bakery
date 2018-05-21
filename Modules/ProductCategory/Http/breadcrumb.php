<?php

Breadcrumbs::register('admin.productcategory.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('productcategory::menus.backend.productcategory.management'), route('admin.productcategory.index'));
});

Breadcrumbs::register('admin.productcategory.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.productcategory.index');
    $breadcrumbs->push(trans('productcategory::menus.backend.productcategory.create'), route('admin.productcategory.create'));
});

Breadcrumbs::register('admin.productcategory.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.productcategory.index');
    $breadcrumbs->push(trans('productcategory::menus.backend.productcategory.edit'), route('admin.productcategory.edit', $id));
});
