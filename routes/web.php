<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PartnerLogoController;


Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');

});
Route::get('/reference', [FrontendController::class, 'reference'])->name('reference');
Route::get('/products', [FrontendController::class, 'products'])->name('products');

Route::get('/products3d/{id}', [FrontendController::class, 'show'])
    ->name('products3d.show');


Route::view('/contact', 'contact');

Route::view('/quote', 'quote');
Route::view('/supplier', 'supplier-apply');


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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('partner-logos', [PartnerLogoController::class, 'index'])->name('partner_logos.index');
    Route::get('partner-logos/create', [PartnerLogoController::class, 'create'])->name('partner_logos.create');
    Route::post('partner-logos', [PartnerLogoController::class, 'store'])->name('partner_logos.store');
    Route::get('partner-logos/{id}/edit', [PartnerLogoController::class, 'edit'])->name('partner_logos.edit');
    Route::put('partner-logos/{id}', [PartnerLogoController::class, 'update'])->name('partner_logos.update');
    Route::delete('partner-logos/{id}', [PartnerLogoController::class, 'destroy'])->name('partner_logos.destroy');
});
