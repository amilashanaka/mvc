<?php
include_once("model/User.php");
class UserController{
    public $model;
    public function __construct(){
        $this->model = new User();
    }
    public function invoke(){
        if(!isset($_GET['user'])){
            $users = $this->model->getAllUser();
            include 'view/userlist.php';
        }
        else{
            $user = $this->model->getUser($_GET['user']);
            include 'view/viewuser.php';
        }}}