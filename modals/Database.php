<?php

date_default_timezone_set('Asia/Kolkata');

class Database
{
    static function getConnection()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=trashproject", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        } catch(PDOException $e) {
            echo "Connection failed: " . var_dump($e->getMessage());
        }

        return $conn;
    }
}
