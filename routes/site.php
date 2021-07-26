<?php

use Illuminate\Support\Facades\Route;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'  ]
    ], function(){

    Route::get('/', 'website\WebsiteController@index')->name('website');
    Auth::routes();

    Route::group(['namespace' => 'website' ] ,function (){

        Route::get('/website', 'WebsiteController@index')->name('website');
        Route::get('/show_category/{id}', 'WebsiteController@show_category')->name('show_category');
        Route::get('/show_news/{id}', 'WebsiteController@show_news_without_increase')->name('show_news_without_increase');
        Route::post('/show_news/{id}', 'WebsiteController@show_news')->name('show_news');
        Route::post('/store_comment' , 'CommentController@store')->name('store_comment');
        Route::post('/edit_comment/{id}' , 'CommentController@update')->name('edit_comment');
        Route::post('/delete_comment' , 'CommentController@destroy')->name('delete_comment');
        Route::post('/increase_view', 'WebsiteController@increase_view')->name('increase_view');
        Route::get('/join_the_reporters' , 'WebsiteController@join_the_reporters')->name('join_the_reporters');
        Route::post('/store_join_the_reporters' , 'WebsiteController@store_join_the_reporters')->name('store_join_the_reporters');



    });


});
