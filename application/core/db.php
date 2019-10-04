<?php

class DB {

    protected static $instance;

    protected function __construct() {}

    public static function getInstance($dsn, $user, $pass) {

        if(empty(self::$instance)) {

            try {
                self::$instance = new PDO($dsn, $user, $pass);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
                self::$instance->query('SET NAMES utf8');
                self::$instance->query('SET CHARACTER SET utf8');

            } catch(PDOException $error) {
                echo $error->getMessage();
            }

        }

        return self::$instance;
    }

    public static function setCharsetEncoding() {
        if (self::$instance == null) {
            self::connect();
        }

        self::$instance->exec(
            "SET NAMES 'utf8';
			SET character_set_connection=utf8;
			SET character_set_client=utf8;
			SET character_set_results=utf8");
    }
}