<?php

$routes = [
    '/' => [
        'controller' => 'index',
        'action' => 'index'
    ],
    '/show' => [
        'controller' => 'index',
        'action' => 'show'
    ],
    '/hello' => [
        'controller' => 'helloWorld',
        'action' => 'hello'
    ],
    '/world' => [
        'controller' => 'helloWorld',
        'action' => 'world'
    ],
    '/login' =>
    [
        'controller' => 'index',
        'action' => 'login'
    ],
    '/auth' =>
    [
        'controller' => 'index',
        'action' => 'auth'
    ],
    '/registr' =>
    [
        'controller' => 'index',
        'action' => 'registr'
    ],
    '/addInfo/Form' =>
    [
        'controller' => 'index',
        'action' => 'addInfo'
    ],
    '/add' =>
    [
        'controller' => 'index',
        'action' => 'add'
    ],
];
