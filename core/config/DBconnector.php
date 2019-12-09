<?php

namespace core\config;

class DB
{
    protected static function connect()
    {
        return new \PDO("mysql:host=".$_ENV['host'].";dbname=".$_ENV['dbname'], $_ENV["name"],$_ENV["password"]);
    }
}
