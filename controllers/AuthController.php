<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

class AuthController extends Controller
{


    public function login(Request $request)
    {
        if($request->isPost()){

            return 'handel submited data';

        }

        $this->setLayout('auth');

        return $this->render('login');
    }


    public function register(Request $request)
    {
        if($request->isPost()){

            $registerModel=new RegisterModel();
            $registerModel->loadData($request->getBody());

          
            if($registerModel->validate() && $registerModel->register()){

                return 'sucessfully registered';

            }

            var_dump($registerModel->errors);
            exit;


            return $this->render('register',['model'=>$registerModel]);

        }

        $this->setLayout('auth');

        return $this->render('register',['model'=>$registerModel]);
    }
}
