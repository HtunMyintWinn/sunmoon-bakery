<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\ProductCategory\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('productcategory/get', 'ProductCategoryTableController')->name('productcategory.get');
            /*
             * User CRUD
             */
            Route::resource('productcategory', 'ProductCategoryController');
});
