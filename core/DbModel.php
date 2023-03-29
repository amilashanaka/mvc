<?php 

namespace app\core;

use app\core\Model;

abstract class DbModel extends Model{

abstract public function tableName(): string;
abstract public function attributes(): array;

public function save(){

$tableName=$this->tableName();
$attributes=$this->attributes();



$params=array_map(fn($attr)=>":$attr",$attributes);


// $sql="Insert into " . $tableName."(".implode(','.$attributes).") values(".implode(',',$params).")";



$statement=self::prepare("Insert into $tableName(".implode(','.$attributes).") values(".implode(',',$params).")");
var_dump($statement);
exit;

    
}

public static function prepare($sql){

    return Application::$app->db->pdo->prepare($sql);


}


}