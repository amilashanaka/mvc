<?php 

namespace app\models;
use app\core\Model;
use app\models\User;
use app\core\Application;
class LoginForm extends Model
{


    public string $email ='';
    public string $password ='';
    public string $username ='';
    
    public function rules():array{

        return [
            'email' => [self::RULE_REQUIRED,self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        
        ];
    }

    public function labels(): array
    {
        return ['email'=>'Your Email', 'password'=>'Your Password'];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);

        if(!$user)
        {
            $this->addError('email','user not found with email address'); 
            return false;

        }


   
        if(!password_verify($this->password, $user->password))
        {
            $this->addError('password','password is incorrect');
            return false;

        }
        return Application::$app->login($user);

    }


}