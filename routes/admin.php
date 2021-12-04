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

Auth::routes();

Route::group(['namespace' => 'Admin'], function () {

    Route::get('/admin-login', [
        'as' => 'admin.login',
        'uses' => 'UserController@getLogin',
    ]);

    Route::post('/admin-login', [
        'as' => 'admin.login',
        'uses' => 'UserController@postLogin',
    ]);

    Route::get('/admin-logout', [
        'as' => 'admin.logout',
        'uses' => 'UserController@getLogout',
    ]);
});

Route::group(['prefix' => 'admin','namespace' => 'Admin',
    'middleware' => 'user'], function () {

    Route::get('/',[
        'as' => 'admin.dashboard',
        'uses' => 'AdminController@dashboard'
    ]);

    // Region Admin Product
    Route::group(['prefix' => 'product'], function () {

        #*** Product ***
        Route::group([], function () {
            Route::get('list-product', [
                'as' => 'admin.product.list',
                'uses' => 'ProductController@getListProduct'
            ]);

            Route::get('add-product', [
                'as' => 'admin.product.add',
                'uses' => 'ProductController@getAddProduct'
            ]);

            Route::post('add-product', [
                'as' => 'admin.product.add',
                'uses' => 'ProductController@postAddProduct'
            ]);

            Route::get('edit-product/{id}', [
                'as' => 'admin.product.edit',
                'uses' => 'ProductController@getEditProduct'
            ]);

            Route::post('edit-product/{id}', [
                'as' => 'admin.product.edit',
                'uses' => 'ProductController@postEditProduct'
            ]);

            Route::get('delete-product/{id}', [
                'as' => 'admin.product.delete',
                'uses' => 'ProductController@getDeleteProduct'
            ]);
        });
        #end

        #*** Cate Product ***
        Route::group([], function () {
            Route::get('list-cate-product', [
                'as' => 'admin.product.cate.getList',
                'uses' => 'ProductController@getListCate'
            ]);

            Route::get('add-cate-product', [
                'as' => 'admin.product.cate.getAddCate',
                'uses' => 'ProductController@getAddCate'
            ]);

            Route::post('add-cate-product', [
                'as' => 'admin.product.cate.postAddCate',
                'uses' => 'ProductController@postAddCate'
            ]);

            Route::get('edit-cate-product/{id}', [
                'as' => 'admin.product.cate.getEditCate',
                'uses' => 'ProductController@getEditCate'
            ]);

            Route::post('edit-cate-product/{id}', [
                'as' => 'admin.product.cate.postEditCate',
                'uses' => 'ProductController@postEditCate'
            ]);

            Route::get('delete-cate-product/{id}', [
                'as' => 'admin.product.cate.getDeleteCate',
                'uses' => 'ProductController@getDeleteCate'
            ]);
        });
        #end
    });
    // End Region

    // Region user
    Route::group(['prefix' => 'user'], function () {
        #*** User Register ***
        Route::get('list-user-register', [
            'as' => 'admin.user.getListUserRegister',
            'uses' => 'UserController@getListUserRegister'
        ]);

        Route::get('add-user-register', [
            'as' => 'admin.user.getAddUserRegister',
            'uses' => 'UserController@getAddUserRegister'
        ]);

        Route::post('add-user-register', [
            'as' => 'admin.user.postAddUserRegister',
            'uses' => 'UserController@postAddUserRegister'
        ]);

        Route::get('edit-user-register/{id}', [
            'as' => 'admin.user.getEditUserRegister',
            'uses' => 'UserController@getEditUserRegister'
        ]);

        Route::post('edit-user-register/{id}', [
            'as' => 'admin.user.postEditUserRegister',
            'uses' => 'UserController@postEditUserRegister'
        ]);

        Route::get('delete-user-register/{id}', [
            'as' => 'admin.user.getDeleteUserRegister',
            'uses' => 'UserController@getDeleteUserRegister'
        ]);
        #end

        #*** User Manager
        Route::get('list-user-manager', [
            'as' => 'admin.user.getListUserManager',
            'uses' => 'UserController@getListUserManager'
        ]);

        Route::get('add-user-manager', [
            'as' => 'admin.user.getAddUserManager',
            'uses' => 'UserController@getAddUserManager'
        ]);

        Route::post('add-user-manager', [
            'as' => 'admin.user.postAddUserManager',
            'uses' => 'UserController@postAddUserManager'
        ]);

        Route::get('edit-user-manager/{id}', [
            'as' => 'admin.user.getEditUserManager',
            'uses' => 'UserController@getEditUserManager'
        ]);

        Route::post('edit-user-manager/{id}', [
            'as' => 'admin.user.postEditUserManager',
            'uses' => 'UserController@postEditUserManager'
        ]);
        #end
    });
    // End region

    #*** Region Frontend
    Route::group(['prefix' => ''], function () {
        
    });
    #end
    
});

