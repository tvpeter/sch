<?php
//namespace Model;

class Connection
{
    public static function make($config)
    {
        try {
            return new PDO(
                "mysql:host=" . DBHOST . "; dbname=" . DBNAME,
                DBUSER,
                DBPASS,
                ['PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION']
            );
        } catch (PDOException $e) {
            die($e);
        }
    }
}
