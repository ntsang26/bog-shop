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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', [
        'as' => 'home',
        'uses' => 'HomeController@index'
    ]);

    Route::get('prd-detail/{id}-{slug}.html', [
        'as' => 'product.detail',
        'uses' => 'HomeController@getDetailPrd',
    ]);
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
