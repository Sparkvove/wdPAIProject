<?php

require_once 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('register', 'DefaultController');

Routing::post('login', 'SecurityController');
Routing::post('addBook', 'BookController');
Routing::get('dashboard', 'DefaultController');
Routing::get('search', 'BookController');
Routing::get('list', 'DefaultController');
Routing::get('book', 'DefaultController');
Routing::run($path);
