<?php

class Db extends PDO{

    private static $conn;
    public static function getInstance() {
        if( is_null(self::$conn)) {
            self::$conn = new PDO("mysql:host=localhost;dbname=phpw41", "root", "");
        }
        return self::$conn;
    }
}
