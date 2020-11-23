<?php

//use Illuminate\Routing\Route;
Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function() {
        
        Route::resource('stores', 'StoreController');
        Route::resource('products', 'ProductController');

});