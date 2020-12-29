<?php

date_default_timezone_set('Asia/Kolkata');

class Database
{
    static function getConnection()
    {
        $dsn ="mysql:host=localhost;dbname=trashproject";
        $username = "root";
        $password = "";
        try
        {
            $conn = new PDO($dsn, $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        } catch(PDOException $e) {
            echo "Connection failed: " . var_dump($e->getMessage());
        }

        return $conn;
    }
}
