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

Route::get('/admin', [
    'as' => 'admin.login',
    'uses' => 'AdminController@loginAdmin'
]);
Route::get('/logout', [
    'as' => 'admin.logout',
    'uses' => 'AdminController@logout'
]);

Route::post('/admin', [
    'as' => 'admin.post.login',
    'uses' => 'AdminController@postLoginAdmin'
]);

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::group(['prefix' => 'admin'], function () {
    Route::prefix('categories')->group(function(){
        Route::get('/',[
            'as' => 'categories.index',
            'uses' => 'CategoryController@index'
        ]);
        Route::get('/create',[
            'as' => 'categories.create',
            'uses' => 'CategoryController@create'
        ]);
        Route::post('/store',[
            'as' => 'categories.store',
            'uses' => 'CategoryController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit'
        ]);
        Route::put('/update/{id}',[
            'as' => 'categories.update',
            'uses' => 'CategoryController@update'
        ]);
        Route::delete('/delete/{id}',[
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete'
        ]);
    });
    
    Route::prefix('menus')->group(function(){
        Route::get('/',[
            'as' => 'menus.index',
            'uses' => 'MenuController@index'
        ]);
        Route::get('/create',[
            'as' => 'menus.create',
            'uses' => 'MenuController@create'
        ]);
        Route::post('/store',[
            'as' => 'menus.store',
            'uses' => 'MenuController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'menus.edit',
            'uses' => 'MenuController@edit'
        ]);
        Route::put('/update/{id}',[
            'as' => 'menus.update',
            'uses' => 'MenuController@update'
        ]);
        Route::delete('/delete/{id}',[
            'as' => 'menus.delete',
            'uses' => 'MenuController@delete'
        ]);
    });

    Route::prefix('products')->group(function(){
        Route::get('/',[
            'as' => 'products.index',
            'uses' => 'AdminProductController@index'
        ]);
        Route::get('/create',[
            'as' => 'products.create',
            'uses' => 'AdminProductController@create'
        ]);
        Route::post('/store',[
            'as' => 'products.store',
            'uses' => 'AdminProductController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'products.edit',
            'uses' => 'AdminProductController@edit'
        ]);
        Route::put('/update/{id}',[
            'as' => 'products.update',
            'uses' => 'AdminProductController@update'
        ]);
        Route::delete('/delete/{id}',[
            'as' => 'products.delete',
            'uses' => 'AdminProductController@delete'
        ]);
    });

    Route::prefix('sliders')->group(function(){
        Route::get('/',[
            'as' => 'sliders.index',
            'uses' => 'SliderAdminController@index'
        ]);
        Route::get('/create',[
            'as' => 'sliders.create',
            'uses' => 'SliderAdminController@create'
        ]);
        Route::post('/store',[
            'as' => 'sliders.store',
            'uses' => 'SliderAdminController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'sliders.edit',
            'uses' => 'SliderAdminController@edit'
        ]);
        Route::put('/update/{id}',[
            'as' => 'sliders.update',
            'uses' => 'SliderAdminController@update'
        ]);
        Route::delete('/delete/{id}',[
            'as' => 'sliders.delete',
            'uses' => 'SliderAdminController@delete'
        ]);
    });

    Route::prefix('settings')->group(function(){
        Route::get('/',[
            'as' => 'settings.index',
            'uses' => 'SettingAdminController@index'
        ]);
        Route::get('/create',[
            'as' => 'settings.create',
            'uses' => 'SettingAdminController@create'
        ]);
        Route::post('/store',[
            'as' => 'settings.store',
            'uses' => 'SettingAdminController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'settings.edit',
            'uses' => 'SettingAdminController@edit'
        ]);
        Route::put('/update/{id}',[
            'as' => 'settings.update',
            'uses' => 'SettingAdminController@update'
        ]);
        Route::delete('/delete/{id}',[
            'as' => 'settings.delete',
            'uses' => 'SettingAdminController@delete'
        ]);
    });

    Route::prefix('users')->group(function(){
        Route::get('/',[
            'as' => 'users.index',
            'uses' => 'AdminUserController@index'
        ]);
        Route::get('/create',[
            'as' => 'users.create',
            'uses' => 'AdminUserController@create'
        ]);
        Route::post('/store',[
            'as' => 'users.store',
            'uses' => 'AdminUserController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'users.edit',
            'uses' => 'AdminUserController@edit'
        ]);
        Route::put('/update/{id}',[
            'as' => 'users.update',
            'uses' => 'AdminUserController@update'
        ]);
        Route::delete('/delete/{id}',[
            'as' => 'users.delete',
            'uses' => 'AdminUserController@delete'
        ]);
    });

    Route::prefix('roles')->group(function(){
        Route::get('/',[
            'as' => 'roles.index',
            'uses' => 'AdminRoleController@index'
        ]);
        Route::get('/create',[
            'as' => 'roles.create',
            'uses' => 'AdminRoleController@create'
        ]);
        // Route::post('/store',[
        //     'as' => 'roles.store',
        //     'uses' => 'AdminRoleController@store'
        // ]);
        // Route::get('/edit/{id}',[
        //     'as' => 'roles.edit',
        //     'uses' => 'AdminRoleController@edit'
        // ]);
        // Route::put('/update/{id}',[
        //     'as' => 'roles.update',
        //     'uses' => 'AdminRoleController@update'
        // ]);
        // Route::delete('/delete/{id}',[
        //     'as' => 'roles.delete',
        //     'uses' => 'AdminRoleController@delete'
        // ]);
    });
});

