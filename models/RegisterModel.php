<?php

namespace app\models;
use app\core\Model;

class RegisterModel extends Model{

    public string $username;
    public string $email;
    public string $password;
    public string $confoirm_password;


    public function register(){


        echo "Registering new user...";
    }


    public function rules(): array
    {
        return [

            'username'=>[self::RULE_REQUIRED],
            'password'=>[self::RULE_REQUIRED],
            'email'=>[self::RULE_REQUIRED,self::RULE_EMAIL],
            'password'=>[self::RULE_REQUIRED,[self::RULE_MIN,'min'=>8],[self::RULE_MAX,'max'=>24]],
            'confoirm_password'=>[self::RULE_REQUIRED,[self::RULE_MATCH,'match'=>'password']],


        ];
    }
 




}