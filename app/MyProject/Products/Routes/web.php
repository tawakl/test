<?php

Route::group(['prefix' => 'products'], function () {
    Route::get('/', '\App\MyProject\Products\Controllers\ProductsController@getIndex')->name('products');

    Route::get('/create', '\App\MyProject\Products\Controllers\ProductsController@getCreate');
    Route::post('/create', '\App\MyProject\Products\Controllers\ProductsController@postCreate');

    Route::get('/edit/{id}', '\App\MyProject\Products\Controllers\ProductsController@getEdit');
    Route::put('/edit/{id}', '\App\MyProject\Products\Controllers\ProductsController@postEdit');

    Route::delete('/delete/{id}', '\App\MyProject\Products\Controllers\ProductsController@getDelete')->name('products.delete');
});
