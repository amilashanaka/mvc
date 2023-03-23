<?php

namespace app\core;

class Database
{



    public \PDO $pdo;


    public function __construct(array $config)
    {


        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';

        // var_dump($config);
        // exit;


        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations()
    {
        $this->createMigrationsTables();
        $this->getAppliedMigrations();
        $files=scandir(Application::$ROOT_DIR.'/migrations');

    }

    public function createMigrationsTables()
    {

        $sql = "CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO INCREMENT PRIMARY KEY
            migration VARCHAR(255)
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";

        $this->pdo->exec($sql);
    }

    public function getAppliedMigrations(){

        $statement=$this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }
}
