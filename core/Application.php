<?php

namespace app\core;
use app\core\Controller;

class Application
{

  public static string $ROOT_DIR;

  public Router $router;

  public Request $request;

  public Response $response;

  public Session $session;

  public static Application $app;

  public Controller $controller;

  public Database $db;

  public ?DbModel $user;

  public string $userClass;
  
  
  public function __construct($rootPath, array $config )
  {


    self::$ROOT_DIR = $rootPath;
    self::$app=$this;
    $this->request = new Request();
   
    $this->response = new Response();

    $this->session = new Session();

    $this->router = new Router($this->request,$this->response);

    $this->db = new Database($config['db']);

    $this->userClass = $config['user_class'];

    $primeryValue = $this->session->get('user');

  

    if ($primeryValue)
    {
      $primeryKey = $this->userClass::primeryKey();
  

      $this->user = $this->userClass::findOne([$primeryKey => $primeryValue]);

    }else{
      $this->user = null;
    }


  }

  public function run()
  {

    echo  $this->router->resolve();
  }

  public function getController(){

    return $this->controller;
  }


  public function setController(Controller $controller){

    $this->controller = $controller;


  }

  public function login(Dbmodel $user)
  {
    $this->user = $user;
    $primeryKey =$user->primeryKey();
    $primeryValue = $user->{$primeryKey};
    $this->session->set('user',$primeryValue);
    return true;


  }

  public function logout()
  {

    $this->user = null;
    $this->session->remove('user');

  }

  public static function isGuest()
  {
    return !self::$app->user;
  }




}
