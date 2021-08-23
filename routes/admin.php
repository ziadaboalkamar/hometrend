<?php

use Illuminate\Support\Facades\Route;
Route::group(['namespace' => 'Admin','middleware' => 'auth:admin'] , function (){
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

    #################### Start Category route ########################

Route::group(['prefix' => 'Category'],function (){
    Route::get('/','CategoryController@index')->name('admin.categories');
    Route::get('create','CategoryController@create')->name('admin.categories.create');
    Route::post('store','CategoryController@store')->name('admin.categories.store');
    Route::get('edit/{id}','CategoryController@edit')->name('admin.categories.edit');
    Route::post('update/{id}','CategoryController@update')->name('admin.categories.update');
    Route::get('delete/{id}','CategoryController@destroy')->name('admin.categories.delete');
    Route::get('unactive/{id}','CategoryController@unactive')->name('admin.categories.unactive');
    });
    ##################### End Category route #########################

    #################### Start Designer Category route ########################

    Route::group(['prefix' => 'Designer_Category'],function (){
        Route::get('/','DesignerCategoryController@index')->name('admin.prof.categories');
        Route::get('create','DesignerCategoryController@create')->name('admin.prof.categories.create');
        Route::post('store','DesignerCategoryController@store')->name('admin.prof.categories.store');
        Route::get('edit/{id}','DesignerCategoryController@edit')->name('admin.prof.categories.edit');
        Route::post('update/{id}','DesignerCategoryController@update')->name('admin.prof.categories.update');
        Route::get('delete/{id}','DesignerCategoryController@destroy')->name('admin.prof.categories.delete');
        Route::get('unactive/{id}','DesignerCategoryController@unactive')->name('admin.prof.categories.unactive');
    });
    ##################### End Designer Category route #########################


    #################### Start Product route ########################

    Route::group(['prefix' => 'Product'],function (){
        Route::get('/','ProductController@index')->name('admin.products');
        Route::get('create','ProductController@create')->name('admin.product.create');
        Route::post('store','ProductController@store')->name('admin.product.store');
        Route::get('edit/{id}','ProductController@edit')->name('admin.product.edit');
        Route::post('update/{id}','ProductController@update')->name('admin.product.update');
        Route::get('delete/{id}','ProductController@destroy')->name('admin.product.delete');
        Route::get('unactive/{id}','ProductController@unactive')->name('admin.product.unactive');
    });
    ##################### End Product route #########################

    #################### Start User route ########################

    Route::group(['prefix' => 'User'],function (){
        Route::get('/','UserController@index')->name('admin.users');
        Route::get('delete/{id}','UserController@destroy')->name('admin.users.delete');
        Route::get('unactive/{id}','UserController@unactive')->name('admin.users.unactive');
    });
    ##################### End User route #########################
    #################### Start designer route ########################

    Route::group(['prefix' => 'Designer'],function (){
        Route::get('/','DesignerController@index')->name('admin.designers');
        Route::get('delete/{id}','DesignerController@destroy')->name('admin.designers.delete');
        Route::get('unactive/{id}','DesignerController@unactive')->name('admin.designers.unactive');
    });
    ##################### End designer route #########################

    #################### Start designer route ########################

    Route::group(['prefix' => 'Local_Manufacture'],function (){
        Route::get('/','LocalManfactureController@index')->name('admin.local');
        Route::get('delete/{id}','LocalManfactureController@destroy')->name('admin.local.delete');
      Route::get('gallery/{id}','LocalManfactureController@showGallery')->name('admin.local.gallery');

    });
    ##################### End designer route #########################

    #################### Start Order route ########################

    Route::group(['prefix' => 'Order'],function (){
        Route::get('/','OrderController@index')->name('admin.order');
        Route::get('delete/{id}','OrderController@destroy')->name('admin.order.delete');
    });
    ##################### End Order route #########################
});



Route::group(['namespace' => 'Admin','middleware' => 'guest:admin'] , function (){
  Route::get("login" ,  'LoginController@getlogin')->name('get.admin.login');
  Route::post("login" ,  'LoginController@login')->name('admin.login');
});





