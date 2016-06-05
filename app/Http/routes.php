<?php

use Illuminate\Routing\Router;
/** @var Router $router */

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



});



