<?php

Route::group(['prefix' => '/v1', 'middleware' => ['auth:api'], 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::post('change-password', 'ChangePasswordController@changePassword')->name('auth.change_password');
    Route::apiResource('rules', 'RulesController', ['only' => ['index']]);
    Route::apiResource('permissions', 'PermissionsController');
    Route::apiResource('roles', 'RolesController');
    Route::apiResource('users', 'UsersController');
    Route::apiResource('productdetails', 'ProductdetailsController');
    Route::apiResource('vendors', 'VendorsController');
    Route::apiResource('productprices', 'ProductpricesController');
});


Route::group(['prefix' => '/v1','namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::apiResource('shop', 'ShopController');
    Route::get('shop/{id}/{token}', 'ShopController@addvariation')->name('shop.veriation');
    Route::get('productprice/{id}', 'ShopController@productprice')->name('shop.productprice');
});

// Route::apiResource('shop', 'ShopController');