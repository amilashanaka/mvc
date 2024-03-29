<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\models\LoginForm;
use app\models\User;
use app\core\Response;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
     
        $loginForm = new LoginForm();

   

        if ($request->isPost()) {

          

            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {

            
                    $response->redirect('/');
                    return;

                
              

            }

           
    }

    return $this->render('login',['model' => $loginForm]);

}

    public function register(Request $request)
    {
        $User = new User();

        if ($request->isPost()) {

            $User->loadData($request->getBody());

            if ($User->validate() && $User->save()) {

                Application::$app->session->setFlash('sucess', 'Thank you for registering');
                Application::$app->response->redirect('/');

            }

            $this->setLayout('auth');

            return $this->render('register', ['model' => $User]);

        }

        $this->setLayout('auth');

        return $this->render('register', ['model' => $User]);
    }

    public function logout(Request $request, Response $response){

        Application::$app->logout();
        $response->redirect('/');




    }

    public function profile(){

        return $this->render('profile');

        
    }
}
