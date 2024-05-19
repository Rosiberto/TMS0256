<?php

$routes = [
    '/' => 'HomeController@index',
    '/cliente' => 'ClientController@index',
    '/cliente/{id}' => 'ClientController@show',
    '/cliente/novo' => 'ClientController@create'
];