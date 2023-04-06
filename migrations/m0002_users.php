<?php

use app\core\Application;
class m0002_users{


    public function up(){

       
      $db=Application::$app->db;

      $sql="CREATE TABLE IF NOT EXISTS `users` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `username` varchar(250) NOT NULL,
        `password` varchar(250) NOT NULL,
        `email` varchar(250) NOT NULL,
        `created_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        `status` TINYINT DEFAULT 1,
        PRIMARY KEY (`id`)
      ) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;";

      $db->pdo->exec($sql);
    }

    public function down(){

        $db=Application::$app->db;

        $sql="DROP TABLE `users`;";
  
        $db->pdo->exec($sql);

    }


    
}