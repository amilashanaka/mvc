<?php

namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller{



    public function index(){

        $params=[
            'name' => 'Amila',


        ];

        return $this->render('home',$params);
    }


    public function contact(){


        return $this->render('contact');
    }

    public function submit_conttact(Request $request){



      $body= $request->getBody();

      var_dump($body);
    }


}