<?php

class DB  {

    protected static $db = null;

    const HOST = 'localhost';
    const NAME = 'custom-cms';
    const USER = 'root';
    const PASS = 'qwe123';

    public static function getInstance()
    {

        if (is_null(self::$db)) {
            try {
                return self::$db = new PDO('mysql:host=' . DB::HOST . ';
                                            dbname=' . DB::NAME,
                                            DB::USER,
                                            DB::PASS,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
                );

            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        } else {
            return self::$db;
        }

    }

    public function __construct()
    {

    }

    public function __clone() {

    }

}
