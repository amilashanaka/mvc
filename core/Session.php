<?php

namespace app\core;
class Session
{
    protected const FLASH_KEY = 'flash_messages';
    public function __construct()
    {
        session_start();
        $flash_messages=$_SESSION[self::FLASH_KEY];
        foreach ($flash_messages as $key=>$flash_message)
        {
            // Mark the flash message as removed

        }
    }

    public function setFlash($key, $message)
    {
        $_SESSION[self::FLASH_KEY] = $message;

    }

    public function getFlash($key){

    }

    public function __destruct()
    {
        
    }


}