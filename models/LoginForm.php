<?php 

namespace app\models;
use app\core\Model;
class LoginForm extends Model
{


    public string $e_mail;
    public string $password;
    
    public function rules():array{

        return [
            'email' => [self::RULE_REQUIRED,self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        
        ];
    }


}