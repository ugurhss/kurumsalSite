<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PartnerLogoController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SupplierApplicationController;
use App\Http\Controllers\ContactController;


Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');

});
Route::get('/reference', [FrontendController::class, 'reference'])->name('reference');
Route::get('/products', [FrontendController::class, 'products'])->name('products');

Route::get('/products3d/{id}', [FrontendController::class, 'show'])
    ->name('products3d.show');


Route::view('/contact', 'contact');


Route::get('/supplier', [FrontendController::class, 'supplierApply'])
    ->name('supplier.apply.create');

Route::post('/supplier-applications', [SupplierApplicationController::class, 'store'])
        ->name('supplier.apply.store');

Route::post('/quote', [QuoteController::class, 'store'])->name('quote.store');
Route::get('/quote', [FrontendController::class, 'quote'])->name('quote.create');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact.create');











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

Route::prefix('admin')->group(function () {
    Route::get('/quotes', [QuoteController::class, 'index']);
    Route::get('/quotes/{id}', [QuoteController::class, 'show']);
    Route::patch('/quotes/{id}', [QuoteController::class, 'update']);
    Route::delete('/quotes/{id}', [QuoteController::class, 'destroy']);
});

Route::prefix('admin')->group(function () {
    Route::get('/supplier-applications', [SupplierApplicationController::class, 'index'])
        ->name('admin.supplier_applications.index');

    Route::get('/supplier-applications/{id}', [SupplierApplicationController::class, 'show'])
        ->name('admin.supplier_applications.show');

    Route::patch('/supplier-applications/{id}/status', [SupplierApplicationController::class, 'updateStatus'])
        ->name('admin.supplier_applications.status');
});

Route::prefix('admin')->group(function () {
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('admin.contacts.show');
    Route::patch('/contacts/{id}/status', [ContactController::class, 'updateStatus'])->name('admin.contacts.status');
});