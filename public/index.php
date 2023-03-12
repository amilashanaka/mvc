<?php

require_once __DIR__ . './../vendor/autoload.php';

use app\controllers\SiteController;
use app\core\Application;

$app= new Application(dirname(__DIR__));

$app->router->get('/',[SiteController::class,'index']);

$app->router->get('/contact',[SiteController::class,'contact']);

$app->router->post('/contact',[SiteController::class,'submit_conttact']);

$app->run();
