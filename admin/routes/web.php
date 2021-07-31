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

Route::get('/', function () {
    if (session()->get('admin')) {
        return redirect('/admin/theme/list');
    }else{
        return redirect('/admin/login');
    }
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Admin\IndexController@toLogin');
    Route::post('service/login', 'Admin\IndexController@Login');
    Route::get('exit', 'Admin\IndexController@toExit');
    Route::get('theme/list','Admin\ThemeController@toTheme');
    Route::get('theme_add','Admin\ThemeController@addTheme');
    Route::post('theme/img','Admin\ThemeController@ThemeImg');
    Route::any('theme/save','Admin\ThemeController@Save');
    Route::get('theme_edit','Admin\ThemeController@ToThemeEdit');
    Route::get('theme/edit','Admin\ThemeController@ThemeEdit');
    Route::post('theme/del','Admin\ThemeController@ThemeDel');
    Route::get('category','Admin\CategoryController@toCategory');
    Route::get('category_add','Admin\CategoryController@ToCategoryAdd');
    Route::any('category/save','Admin\CategoryController@SaveCategory');
    Route::get('category_edit','Admin\CategoryController@ToCategoryEdit');
    Route::get('category/edit','Admin\CategoryController@CategoryEdit');
    Route::post('category/del','Admin\CategoryController@CategoryDel');
    Route::get('order/list','Admin\OrderController@toOrder');
    Route::get('order_edit','Admin\OrderController@editOrder');
    Route::get('store/list','Admin\StoreController@toStore');
    Route::get('store_add','Admin\StoreController@ToStoreAdd');
    Route::any('store/save','Admin\StoreController@SaveStore');
    Route::get('store_edit','Admin\StoreController@ToStoreEdit');
    Route::get('store/edit','Admin\StoreController@ ');

});

Route::get('theme/new','Api\ThemeController@ThemeNew');
Route::get('theme/all','Api\ThemeController@ThemeAll');
Route::get('theme/category','Api\ThemeController@CategoryAll');
Route::get('theme/{id}','Api\ThemeController@Theme');
Route::get('themecategory/{id}','Api\ThemeController@ThemeCategory');
Route::post('user/add','Api\UserController@UserAdd');
Route::post('user/login','Api\UserController@Login');
Route::post('account/get','Api\UserController@GetAccount');
Route::post('user/password','Api\UserController@UpPassword');
Route::post('user/update','Api\UserController@UserUpdate');
Route::get('store/get','Api\StoreController@StoreGet');
Route::get('store/all','Api\StoreController@StoreList');
Route::get('store/{id}','Api\StoreController@Store');
Route::post('order/to','Api\OrderController@ToOrder');
Route::post('order/get','Api\OrderController@GetOrder');
Route::post('account/save','Api\UserController@SaveAccount');
Route::post('collect/add','Api\UserController@AddCollect');
Route::post('collect/get','Api\UserController@GetCollect');
Route::post('collect/del','Api\UserController@DelCollect');
Route::post('comment/save','Api\CommentController@SaveComment');
Route::get('comment/get','Api\CommentController@GetComment');
Route::post('collect/user','Api\UserController@GetCollectUser');
