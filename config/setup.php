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


$message = '';

try {

    $db_dsn = explode(';', $DB_DSN);

    $db = DB::getInstance($db_dsn[0], $DB_USER, $DB_PASSWORD);
    DB::setCharsetEncoding();

    if (!DB::isDBExist($DB_NAME)) {

        $db->query("CREATE DATABASE IF NOT EXISTS $DB_NAME;");
        $db->query("use $DB_NAME;");
        $db->query($_user_table);
        $db->query($_photo_table);
        $db->query($_likes_table);
        $db->query($_comment_table);

        $data = [
            'login' => 'admin',
            'email' => 'admin',
            'password' => '123456',
            'status' => 1,
            'role' => 8,
        ];

        $sql = "INSERT INTO users (login, email, password, status, role) VALUES (:login, :email, :password, :status, :role)";
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
        $message = "System successfully installed";

    } else {
        $message = "System already installed";
    }



} catch (Exception $e) {
    echo $e->getMessage();
}

?>


<div>
    <?=$message;?>
</div>
<div>
    <a href="/">START TO USE</a>
</div>