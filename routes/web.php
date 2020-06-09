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
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
