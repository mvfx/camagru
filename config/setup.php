<?php

require_once 'config/database.php';
require_once 'application/core/db.php';


$_user_table = "CREATE TABLE IF NOT EXISTS users (
    id INT(9) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    login VARCHAR(32) NOT NULL,
    email VARCHAR(128) NOT NULL,
    password VARCHAR(256) NOT NULL,
    status INT(1) NOT NULL,
    role INT(1) NOT NULL,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";


$_photo_table = "CREATE TABLE IF NOT EXISTS posts (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    photo VARCHAR(238) NOT NULL,
    login VARCHAR(32) NOT NULL,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";

$_likes_table = "CREATE TABLE IF NOT EXISTS likes (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    post_id INT(9) NOT NULL,
    user_id INT(9) NOT NULL,
    status INT(1) NOT NULL,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";

$_comment_table = "CREATE TABLE IF NOT EXISTS comments
(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    post_id INT(9) NOT NULL,
    user_id INT(9) NOT NULL,
    message LONGTEXT NOT NULL,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";




try {

    $db_dsn = explode(';', $DB_DSN);

    $db = DB::getInstance($db_dsn[0], $DB_USER, $DB_PASSWORD);
//    $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    DB::setCharsetEncoding();

    $db->query("CREATE DATABASE IF NOT EXISTS $DB_NAME;");
    $db->query("use $DB_NAME;");

    $db->query($_user_table);
    $db->query($_photo_table);
    $db->query($_likes_table);
    $db->query($_comment_table);

    $db->query("INSERT INTO users VALUES (null, 'root', 'root', '123456', 1, 8)");



} catch (Exception $e) {
    echo $e->getMessage();

}
