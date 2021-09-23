<?php
class DataBase
{
    public static function connect()
    {
        $db = new mysqli('localhost', 'mikelmif', 'aspire16', 'php_store');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
?>
