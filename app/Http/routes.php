<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->get('/', 'AdvertisementsController@pocetna')->name('pocetna');

$router->group([
    'prefix' => 'advertisements',
], function (Router $router) {

    $router->get('/', 'AdvertisementsController@index')->name('index');
    
    $router->post('/search', 'AdvertisementsController@search')->name('advertisement.search');

    $router->get('/create', 'AdvertisementsController@create')->name('advertisement.create');
    $router->post('/', 'AdvertisementsController@store')->name('advertisement.store');

    $router->get('/{id}', 'AdvertisementsController@view')->name('advertisement.view');

    $router->get('{id}/edit', 'AdvertisementsController@edit')->name('advertisement.edit');
    $router->post('/{id}', 'AdvertisementsController@update')->name('advertisement.update');

    $router->delete('/{advertisements}', 'AdvertisementsController@delete')->name('advertisement.delete');
    
    $router->get('images/{filename}', 'ImagesController@show')->name('image');

    $router->post('/{id}/comments', 'CommentsController@store')->name('comment.store');
});

Route::auth();

Route::get('/home', 'HomeController@index')->middleware('auth');

Route::get('/edit/{id}', 'UserController@edit')->name('user.edit')->middleware('auth');
Route::post('/edit/{id}', 'UserController@update')->name('user.edit')->middleware('auth');

Route::get('/home', 'UserController@myAdvertisements')->name('users.advertisements')->middleware('auth');

Route::get('images/{filename}', ['as' => 'image', 'uses' => 'ImagesController@show']);


$router->group([
    'prefix' => 'admin',
], function (Router $router) {
    $router->get('/', 'AdminController@index')->name('admin.index')->middleware('admin');
    $router->get('/advertisements', 'AdminController@advertisements')->name('admin.advertisements')->middleware('admin');
});