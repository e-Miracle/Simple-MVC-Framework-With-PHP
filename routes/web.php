<?php

use Core\Framework;
$app = new Framework();

$app::get('/', 'HomeController', 'test');

$app::post('/', 'HomeController', 'index');
$app::get('/new', 'HomeController', 'index');
$app::post('/new', 'HomeController', 'index');

$app->run();