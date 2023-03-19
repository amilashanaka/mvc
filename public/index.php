<?php

require_once __DIR__ . './../vendor/autoload.php';

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;

$app= new Application(dirname(__DIR__));

$app->router->get('/',[SiteController::class,'index']);

$app->router->get('/contact',[SiteController::class,'contact']);

$app->router->post('/contact',[SiteController::class,'submit_conttact']);

$app->router->get('/login',[AuthController::class,'login']);
$app->router->get('/register',[AuthController::class,'register']);

$app->router->post('/login',[AuthController::class,'login']);
$app->router->post('/register',[AuthController::class,'register']);

$app->run();
