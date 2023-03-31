<?php
$conn = new mysqli('localhost', 'root', '');

if ($conn->connect_error) {
    die('<br>Грешка: ' . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS infobooks";

if ($conn->query($sql) == TRUE) {
    echo '<br>БД infobooks e създадена<br>';
} else {
    echo '<br>Грешка: ' . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS infobooks.book (
id INT(5) NOT NULL AUTO_INCREMENT , 
title VARCHAR(30) NOT NULL , 
author VARCHAR(30) NOT NULL ,
publisher VARCHAR(30) NOT NULL , 
year INT(5) NOT NULL ,
PRIMARY KEY (`id`))";


if ($conn->query($sql) == TRUE) {
    echo '<br>Tаблица книга е създадена';
} else {
    echo '<br>Грешка: ' . $conn->error;
}
$conn->close();
?>
