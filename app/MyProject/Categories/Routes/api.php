<?php

Route::group(['prefix'=>'categories', 'as'=>'categories.',
    'namespace' => '\App\MyProject\Categories\Controllers\Api'
], function () {

    Route::get('/', 'CategoriesApiController@listAllCategories')
        ->name('get.list-categories');

    Route::post('/create', 'CategoriesApiController@createCategory')
        ->name('post.create');

});
