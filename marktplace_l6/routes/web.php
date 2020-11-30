<?php

//use Illuminate\Routing\Route;

//use Illuminate\Routing\Route;

//Route::get('/', function()->name('home');

//use App\Http\Controllers\Admin\CategoryController;

Route::group(['middleware' => ['auth']], function() {
        Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function() {
        
                Route::resource('stores', 'StoreController');
                Route::resource('products', 'ProductController');
                Route::resource('categories', 'CategoryController');

                Route::post('photos/remove/','ProductPhotoController@removePhoto')->name('photo.remove');


        
        });
        
    
}); 

Auth::routes();

///oller@index')->name('home');
