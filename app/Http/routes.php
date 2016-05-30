<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group([
    'prefix' => 'advertisements',
], function (Router $router) {
    $router->get('/create', 'AdvertisementsController@create')->name('advertisement.create');
    $router->post('/', 'AdvertisementsController@store')->name('advertisement.store');
});



