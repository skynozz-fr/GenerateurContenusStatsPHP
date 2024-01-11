<?php

class Database
{
    private static ?PDO $instance   = null;

    public static function getInstance(
        string $dbName = DB_NAME,
        string $host = DB_HOST,
        int    $port = DB_PORT,
        string $username = DB_USERNAME,
        string $password = DB_PASSWORD
    ): PDO
    {
        if (self::$instance === null) {
            self::$instance = new PDO("mysql:dbname=$dbName;host=$host;port=$port", $username, $password);
        }

        return self::$instance;
    }
}