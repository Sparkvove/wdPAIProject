<?php

require_once 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('register', 'SecurityController');
Routing::post('login', 'SecurityController');
Routing::post('settings', 'SecurityController');
Routing::post('addBook', 'BookController');
Routing::get('dashboard', 'BookController');
Routing::post('search', 'BookController');
Routing::get('list', 'DefaultController');
Routing::get('book', 'BookController');
Routing::get('logout','SecurityController');



Routing::run($path);
