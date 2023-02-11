<?php

namespace App\Controllers;

use App\Models\Product;
use Symfony\Component\Routing\RouteCollection;

class PageController
{

    // Homepage action
    public function indexAction(RouteCollection $routes)
    {
//        $routeToProduct = str_replace('{id}', 1, $routes->get('product')->getPath());
//
//        var_dump("test");

        require_once APP_ROOT . '/views/home.php';
    }
}