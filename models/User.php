<?php

namespace app\models;

use app\core\DbModel;


class User extends DbModel{

    public string $username='';
    public string $email='';
    public string $password='';
    public string $confoirm_password='';


    public function register(){

       return  $this->save();


        echo "Registering new user...";
    }


    public function tableName(): string
    {
        return 'users';
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
 

    public function attributes(): array
    {

        return ['username','password','email'];
    }






}