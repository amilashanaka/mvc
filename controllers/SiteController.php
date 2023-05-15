<?php

namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\ContactForm;
use app\core\Response;

class SiteController extends Controller{



    public function index(){

        $params=[
            'name' => 'Amila',


        ];

        return $this->render('home',$params);
    }


    public function contact(Request $request, Response $response){

        $contact = new ContactForm();

  

        if ($request->isPost()) {

            $contact->loadData($request->getBody());

            if($contact->validate() && $contact->send())
            {
                Application::$app->session->setFlash('sucess', 'Thanks for contacting us');
              return $response->redirect('/contact');
            }

   
        }



        return $this->render('contact',['model' => $contact]);
    }

    public function submit_conttact(Request $request){



      $body= $request->getBody();

    
    }


}