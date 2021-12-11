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
    '/make/ticket' => [
        'controller' => 'index',
        'action' => 'createTicket'
    ],
    '/admin' =>
    [
        'controller' => 'admin',
        'action' => 'adm'
    ],
    '/admin/create/user' =>
    [
        'controller' => 'admin',
        'action' => 'createUserForm'
    ],
    '/admin/newUser' =>
    [
        'controller' => 'admin',
        'action' => 'newUser'
    ],
    '/admin/users' =>
    [
        'controller' => 'admin',
        'action' => 'showUsers'
    ],
    '/admin/user' => [
        'controller' => 'admin',
        'action' => 'showOneUser'
    ],
    '/admin/counter' => [
        'controller' => 'admin',
        'action' => 'showCounter'
    ],
    '/admin/change/user/counters' => [
        'controller' => 'admin',
        'action' => 'changeCounters'
    ],
    '/admin/change/user/counters/confirm' => [
        'controller' => 'admin',
        'action' => 'confirmChangeCounters'
    ],
];
