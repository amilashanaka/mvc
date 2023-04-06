<?php

namespace app\models;

use app\core\DbModel;


class User extends DbModel{

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


    public function tableName(): string
    {
        return 'users';
    }


    public function rules(): array
    {
        return [

            'username'=>[self::RULE_REQUIRED],
            'password'=>[self::RULE_REQUIRED],
            'email'=>[self::RULE_REQUIRED,self::RULE_EMAIL,[self::RULE_UNIQUE,'class'=>self::class,'attribute'=>'username']],
            'password'=>[self::RULE_REQUIRED,[self::RULE_MIN,'min'=>8],[self::RULE_MAX,'max'=>24]],
            'confoirm_password'=>[self::RULE_REQUIRED,[self::RULE_MATCH,'match'=>'password']],


        ];
    }
 

    public function attributes(): array
    {

        return ['username','password','email','status'];
    }






}