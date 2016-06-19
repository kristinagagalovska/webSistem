<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->get('/', 'AdvertisementsController@pocetna')->name('pocetna');

$router->group([
    'prefix' => 'advertisements',
], function (Router $router) {

    $router->get('/', 'AdvertisementsController@index')->name('index');
    
    $router->post('/search', 'AdvertisementsController@search')->name('advertisement.search');

    $router->get('/create', 'AdvertisementsController@create')->name('advertisement.create')->middleware('auth');
    $router->post('/', 'AdvertisementsController@store')->name('advertisement.store')->middleware('auth');

    $router->get('/{id}', 'AdvertisementsController@view')->name('advertisement.view');

    $router->get('{id}/edit', 'AdvertisementsController@edit')->name('advertisement.edit')->middleware('auth');
    $router->post('/{id}', 'AdvertisementsController@update')->name('advertisement.update')->middleware('auth');

    $router->delete('/{advertisements}', 'AdvertisementsController@delete')->name('advertisement.delete')->middleware('auth');
    
    $router->get('images/{filename}', 'ImagesController@show')->name('image');

    $router->post('/{id}/comments', 'CommentsController@store')->name('comment.store')->middleware('auth');
});

Route::auth();

Route::get('/home', 'HomeController@index')->middleware('auth');

Route::get('/edit/{id}', 'UserController@edit')->name('user.edit')->middleware('auth');
Route::post('/edit/{id}', 'UserController@update')->name('user.edit')->middleware('auth');

Route::delete('/delete/{id}', 'UserController@delete')->name('user.delete')->middleware('auth');

Route::put('/{id}', 'UserController@setAdmin')->name('user.setAdmin')->middleware('admin');

Route::get('/home', 'UserController@myAdvertisements')->name('users.advertisements')->middleware('auth');

Route::get('images/{filename}', ['as' => 'image', 'uses' => 'ImagesController@show']);


$router->group([
    
    'prefix' => 'admin',
    'middleware' => 'admin'
    
], function (Router $router) {
    
    $router->get('/', 'AdminController@index')->name('admin.index');
    $router->get('/advertisements', 'AdminController@advertisements')->name('admin.advertisements');
    $router->get('/users', 'AdminController@users')->name('admin.users');
});