<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 11.05.17
 * Time: 17:14
 */
class DB_Connection
{
    private static $_instance = null;
    private function __construct() {
    }

    static public function getInstance() {
        if(is_null(self::$_instance))
        {
            self::$_instance = new PDO("pgsql:dbname=".$_ENV["DB_NAME"].";host=localhost;user=".$_ENV["DB_USERNAME"].";password=".$_ENV["DB_PASSWORD"]);

        }
        return self::$_instance;
    }

    private function __clone() {}

}