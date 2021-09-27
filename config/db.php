<?php
class DataBase
{
    public static function connect()
    {
        $db = new mysqli('localhost', 'secretuser', 'password', 'php_store');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
