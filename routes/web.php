<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
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
