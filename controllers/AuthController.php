<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Application;
use app\models\User;

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
        $User=new User();

        if($request->isPost()){

           
            $User->loadData($request->getBody());

          
            if($User->validate() && $User->save()){

              
                Application::$app->session->setFlash('sucess', 'Thank you for registering');
                Application::$app->response->redirect('/');
               

            }


            $this->setLayout('auth');

            return $this->render('register',['model'=>$User]);

        }

    
       $this->setLayout('auth');

        return $this->render('register',['model'=>$User]);
    }
}
