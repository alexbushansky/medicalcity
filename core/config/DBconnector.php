<?php

class DB
{
    protected function connect()
    {
        return new PDO("mysql:host=127.0.0.1;dbname=medicalcity", "root","");
    }
}
