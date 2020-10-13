<?php

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', '\App\MyProject\Categories\Controllers\CategoriesController@getIndex')->name('categories');

    Route::get('/create', '\App\MyProject\Categories\Controllers\CategoriesController@getCreate');
    Route::post('/create', '\App\MyProject\Categories\Controllers\CategoriesController@postCreate');

    Route::get('/edit/{id}', '\App\MyProject\Categories\Controllers\CategoriesController@getEdit');
    Route::put('/edit/{id}', '\App\MyProject\Categories\Controllers\CategoriesController@postEdit');

    Route::delete('/delete/{id}', '\App\MyProject\Categories\Controllers\CategoriesController@getDelete')->name('categories.delete');
});
