<?php

namespace app\controllers;
use app\core\Application;

class SiteController{



    public function index(){


        return Application::$app->router->renderView('home');
    }


    public function contact(){


        return Application::$app->router->renderView('contact');
    }

    public function submit_conttact(){


        var_dump($_POST);
    }


}