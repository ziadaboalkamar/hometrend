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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Site'] , function () {

    ################## Start Designer Route #####################
    Route::group(['prefix' => 'Designer'] , function () {
    Route::get('register', 'DesignerController@register')->name('designer.show.register');
        Route::post('register/store', 'DesignerController@store')->name('designer.store.register');
    Route::get('/profile', 'DesignerController@profile')->name('designer.profile');
        Route::post('/add_project', 'DesignerController@project')->name('designer.add.project');
        Route::get('/find', 'DesignerController@searchDesigner')->name('designer.search');
        Route::get('/designer_list', 'DesignerController@List')->name('designer.list');
        Route::get('/designer_show/{id}', 'DesignerController@designerShow')->name('designer.show.page');
        Route::get('search', 'DesignerController@search')->name('designer.find.page');
    });
    ################## END Designer Route #####################

    ################## Start Category Route #####################
    Route::group(['prefix' => 'Category'] , function () {
        Route::get('product/{id}', 'CategoryController@showProduct')->name('category.show.product');
        Route::get('product_page/{id}', 'CategoryController@productPage')->name('category.product.page');
    });
    ################## END Category Route #####################

    ################## Start Local Manufacture Route #####################
    Route::group(['prefix' => 'LocalManufacture'] , function () {
        Route::get('/', 'LocalManufactureController@index')->name('local.show');
        Route::post('local/save', 'LocalManufactureController@store')->name('local.save');
    });
    ################## END Local Manufacture Route #####################

    ################## Start Cart Route #####################
    Route::get('/add_to_cart/{product}', 'CartController@add')->name('cart.add')->middleware('auth');
    Route::get('/cart', 'CartController@index')->name('cart')->middleware('auth');
    Route::get('/delete/{id}', 'CartController@destroy')->name('cart.destroy')->middleware('auth');
    Route::get('/cart/update/{id}', 'CartController@update')->name('cart.update')->middleware('auth');
    Route::post('/checkout', 'CartController@checkout')->name('cart.checkout')->middleware('auth');
    Route::post('/checkout/payment', 'PaymentController@store')->name('cart.checkout.payment')->middleware('auth');




    ################## end Cart Route #####################

    ################# Start Favorite Route #########################
    Route::group(['prefix' => 'favorite'] , function () {
    Route::get('/', 'FavoriteProductController@index')->name('Favorite.show')->middleware('auth');;
        Route::get('add_to_favorite/{id}', 'FavoriteProductController@add')->name('Favorite.add')->middleware('auth');;
        Route::get('remove_from_product/{id}', 'FavoriteProductController@destroy')->name('Favorite.delete')->middleware('auth');;

    });
################ End Favorite Route ######################
    ################# Start Favorite Route #########################
    Route::group(['prefix' => 'Contact'] , function () {
        Route::get('/', 'ContactController@index')->name('contact.show');
        Route::post('/email', 'ContactController@sendEmail')->name('send.email');


    });
################ End Favorite Route ######################

    ################# Start Comment Route #########################
    Route::group(['prefix' => 'Comment'] , function () {
        Route::post('/add_product_comment/{id}', 'CommentController@addProductComment')->name('comment.add');
        Route::post('/add_designer_comment/{id}', 'CommentController@addDesignerComment')->name('comment.add.designer');


    });
################ End Comment Route ######################
});

################# Home #########################
Route::get('profile', 'HomeController@profile')->name('user.show.profile');
Route::get('edit_profile/{id}', 'HomeController@edit')->name('user.edit.profile');
Route::post('update_profile/{id}', 'HomeController@update')->name('user.update.profile');
Route::get('about_us', 'HomeController@about')->name('user.about.us');
Route::get('/product/search', 'HomeController@search')->name('user.search');
################ end home ######################
