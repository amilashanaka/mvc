<?php
use app\core\Application;
class m0001_initial{


    public function up(){

      $db=Application::$app->db;

      

      $db->pdo->exec($sql);
    }

    public function down(){

        echo "role back migration";

    }


    
}