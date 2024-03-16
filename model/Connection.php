<?php
//namespace Model;

class Connection
{
    public static function make($config)
    {
        try {
            $connection = new PDO(
                "mysql:host=" . DBHOST . "; dbname=" . DBNAME,
                DBUSER,
                DBPASS,
            );
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $e) {
            die($e);
        }
    }
}
