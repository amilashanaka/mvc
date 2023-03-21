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

     
        return $this->render('login');
    }


    public function register(Request $request)
    {
        $registerModel=new RegisterModel();

        if($request->isPost()){

           
            $registerModel->loadData($request->getBody());

          
            if($registerModel->validate() && $registerModel->register()){

                return 'sucessfully registered';

            }

        //     echo '<pre>';

        //  var_dump($registerModel->errors);

        //  echo '</pre>';
        //  exit;

            $this->setLayout('auth');

            return $this->render('register',['model'=>$registerModel]);

        }

    
       $this->setLayout('auth');

        return $this->render('register',['model'=>$registerModel]);
    }
}
