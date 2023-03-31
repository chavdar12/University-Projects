<?php
$host = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'infobooks';
$dbConn = mysqli_connect($host, $dbUser, $dbPass, $dbName);

if (!$dbConn) {
    die('Няма връзка със сървър');
}

mysqli_set_charset($dbConn, 'UTF8');

$sql = "CREATE TABLE book (
id INT(5) NOT NULL AUTO_INCREMENT, 
title VARCHAR(30) NOT NULL, 
author VARCHAR(30) NOT NULL,
publisher VARCHAR(30) NOT NULL, 
year INT(5) NOT NULL,
PRIMARY KEY (id)
)";

if (mysqli_query($dbConn, $sql)) {
    echo 'Таблица книга е създадена';
} else {
    echo 'Грешка: ' . mysqli_error($dbConn);
}

mysqli_close($dbConn);
?>
