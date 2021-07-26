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
Route::get('/', 'website\WebsiteController@index')->name('website');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'dashboard'  ]
    ], function(){

    Route::get('/', 'HomeController@index')->name('dashboard');
    Auth::routes();
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::group(['namespace' => 'admin'] ,function (){
        Route::resource('NewsCategory', 'NewsCategoryController');
        Route::resource('Blog', 'BlogController');
        Route::get('/Status_show/{id}', 'BlogController@show')->name('Status_show');
        Route::post('/update_status/{id}', 'BlogController@update_status')->name('update_status');
       // Route::post('/update/{id}', 'BlogController@update')->name('update');
        Route::get('/published_news' , 'BlogController@published_news')->name('published_news');
        Route::get('/approval_of_the_news' , 'BlogController@approval_of_the_news')->name('approval_of_the_news');
        Route::get('/unacceptable_news' , 'BlogController@unacceptable_news')->name('unacceptable_news');
        Route::get('/show_blog/{id}', 'BlogController@show_blog_dashboard')->name('show_blog');

        Route::get('/show_all_request', 'JoinReportersController@index')->name('show_all_request');
        Route::get('/show_join_request/{id}', 'JoinReportersController@show_join_request')->name('show_join_request');
        Route::delete('/delete_request', 'JoinReportersController@delete')->name('delete_request');
        Route::get('call_reporter/{id}', 'JoinReportersController@call_reporter')->name('call_reporter');
        Route::post('send_email_reporter' , 'JoinReportersController@send_email_reporter' ) ->name('send_email_reporter');


    });

    Route::group(['middleware' => ['auth'] , 'namespace' => 'admin'], function() {
        Route::resource('roles','RoleController');
        Route::resource('users','UserController');

    });
});



