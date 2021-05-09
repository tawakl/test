<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('admin.layouts.master');
});

//Route::get('/', '\App\MyProject\Front\Controllers\FrontController@getIndex')->name('front');

require base_path('app/MyProject/Categories/Routes/web.php');
require base_path('app/MyProject/Products/Routes/web.php');


Auth::routes();
Route::get('/',[App\Http\Controllers\InvoiceController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
