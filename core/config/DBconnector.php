<?php

namespace core\config;

use mysql_xdevapi\Exception;

class DB
{
    protected static function connect()
    {
        try {
            $pdo = new \PDO("mysql:host=127.0.0.1;dbname=medicalcity", "root", "");
            $pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch (\PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}
