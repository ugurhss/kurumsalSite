<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\ProductController;



Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');

});
Route::get('/references', function () {
    return view('references');
});
Route::get('/products', function () {
    return view('products');
});
Route::get('/product/{slug}', function ($slug) {
    return view('productsDetail');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('slider', \App\Http\Controllers\Admin\SlideController::class);
});



Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('products3d', [ProductController::class, 'index'])->name('products3d.index');
    Route::get('products3d/create', [ProductController::class, 'create'])->name('products3d.create');
    Route::post('products3d', [ProductController::class, 'store'])->name('products3d.store');
    Route::get('products3d/{id}/edit', [ProductController::class, 'edit'])->name('products3d.edit');
    Route::put('products3d/{id}', [ProductController::class, 'update'])->name('products3d.update');
    Route::delete('products3d/{id}', [ProductController::class, 'destroy'])->name('products3d.destroy');
});
