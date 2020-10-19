<?php

Route::group(['prefix'=>'products', 'as'=>'products.',
    'namespace' => '\App\MyProject\Products\Controllers\Api'
], function () {

    Route::get('/', 'ProductsApiController@listAllProducts')
        ->name('get.list-products');

    Route::post('/create', 'ProductsApiController@createProduct')
        ->name('post.create');

});
