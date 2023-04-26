<?php

namespace app\models;

use app\core\DbModel;
use app\core\UserModel;

class User extends UserModel{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public string $username='';
    public string $email='';
    public string $password='';
    public string $confoirm_password='';
    public int $status=self::STATUS_INACTIVE;


    public function save(){

        $this->status=self::STATUS_INACTIVE;

        $this->password=password_hash($this->password,PASSWORD_DEFAULT);

       return  parent::save();
       
    }


    public static function tableName(): string
    {
        return 'users';
    }

    public static function primeryKey(): string
    {
        return 'id';
    }


    public function rules(): array
    {
        return [

            'username'=>[self::RULE_REQUIRED],
            'password'=>[self::RULE_REQUIRED],
            'email'=>[self::RULE_REQUIRED,self::RULE_EMAIL,[self::RULE_UNIQUE,'class'=>self::class,'attribute'=>'email']],
            'password'=>[self::RULE_REQUIRED,[self::RULE_MIN,'min'=>8],[self::RULE_MAX,'max'=>24]],
            'confoirm_password'=>[self::RULE_REQUIRED,[self::RULE_MATCH,'match'=>'password']]

        ];
    }
 

    public function attributes(): array
    {

        return ['username','password','email','status'];
    }

    public function labels(): array
    {
        return [
            'username' => 'User Name',
            'email' => 'Email',
            'password' => 'Password',
            'confoirm_password' => 'Confoirm Password',
        ];
    }



    public  function get_display_name() : string
    {

        return $this->username;

    }
}