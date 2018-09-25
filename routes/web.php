<?php

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::prefix('{company}')->group(function () {
        Route::get('/', 'Company\CompanyController@company')->name('company');
        Route::get('/members', 'User\MemberController@members')->name('members');
        Route::middleware('can:colleague,member')->group(function (){
            Route::get('/members/{member}', 'User\MemberController@profile')->name('profile');
            Route::middleware('can:self,member')->get('/members/params/{member}', 'User\MemberController@params')->name('params');
            Route::put('/members/params/{member}', 'User\MemberController@update')->name('params.update');
            Route::get('/members/premium/{member}', 'User\PremiumController@premium')->name('premium');
            Route::put('/members/premium/{member}', 'User\PremiumController@update')->name('premium.update');
        });
        Route::middleware('can:myCompany,company')->resource('position', 'Position\PositionController');
        Route::middleware('can:myCompany,company')->resource('token', 'Token\TokenController');
        Route::middleware('can:myCompany,company')->resource('product', 'Store\ProductController');
        Route::middleware('can:myCompany,company')->resource('provider', 'Deal\ProviderController');
        Route::middleware('can:myCompany,company')->resource('client', 'Deal\ClientController');
    });
});
