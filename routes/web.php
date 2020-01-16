<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
//=========================user routes==========================
/*
 * as:like naming route( admin.dashboard,admin.login etc)
 * prefix: admin will add in url (admin/dashboard,admin/login etc)
 * namespace: will add directory name in Controllers(User\HomeController, Admin\AdminController etc)
 * auth: auth in middleware is default authentication in homeController
 * */
Route::group(['namespace'=>'User'],function (){

    Route::get('/home','HomeController@home')->name('home');

    Route::get('/login','LoginController@loginForm')->name('login.form');
    Route::post('/login','LoginController@login')->name('login');



});









//=======================admin routes=====================
Route::group([ 'prefix'=>'admin', 'as'=>'admin.', 'namespace'=>'Admin'],function (){

    Route::get('/login','LoginController@loginForm')->name('login.form');
    Route::post('/login','LoginController@login')->name('login');


    Route::group(['middleware'=>'checkAdmin'],function(){
        Route::get('/dashboard','HomeController@dashboard')->name('dashboard');
        Route::get('/logout','LoginController@logout')->name('logout');

        Route::get('/category/add','CategoryController@index')->name('category.add.form');
        Route::post('/category/add','CategoryController@store')->name('category.add');
        Route::get('/category/read','CategoryController@read')->name('category.read');
        Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit.form');
        Route::post('/category/update/{id}','CategoryController@update')->name('category.update');
        Route::post('/category/delete/{id}','CategoryController@delete')->name('category.delete');

        Route::get('/category/publish/{id}','CategoryController@publish')->name('category.publish');
        Route::get('/category/unpublish/{id}','CategoryController@unpublish')->name('category.unpublish');


    });


});
