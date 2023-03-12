<?php

require_once __DIR__ . './../vendor/autoload.php';


use app\core\Application;

$app= new Application();
// $router= new Router();
$app->router->get('/', function(){

    return 'Hello World';

});

$app->router->get('/contact', function(){

    return 'Contact';

});

// $app->userRouter($router);

$app->run();
