<?php
$conn = new mysqli('localhost', 'root', '');

if ($conn->connect_error) {
    die('<br>Грешка: ' . $conn->connect_error);
}

$sql = "CREATE DATABASE deliveryinfo";

if ($conn->query($sql) == TRUE) {
    echo '<br>БД deliveryinfo e създадена<br>';
} else {
    echo '<br>Грешка: ' . $conn->error;
}

//create companyinfo
$sql = "CREATE TABLE deliveryinfo.companyinfo ( 
id INT(6) NOT NULL AUTO_INCREMENT ,
companyname VARCHAR(30) NOT NULL ,
companynum VARCHAR(30) NOT NULL , 
townname VARCHAR(30) NOT NULL,
companytel VARCHAR(30) NOT NULL ,
companyyear INT(5) NOT NULL ,
companycontact VARCHAR(30) NOT NULL ,
PRIMARY KEY (`id`))";

if ($conn->query($sql) == TRUE) {
    echo '<br>Tаблица companyinfo е създадена';
} else {
    echo '<br>Грешка: ' . $conn->error;
}

$sql2 = "CREATE TABLE deliveryinfo.towns ( 
townid INT(5) NOT NULL AUTO_INCREMENT ,
townname VARCHAR(30) NOT NULL ,
PRIMARY KEY (`townid`))";

if ($conn->query($sql2) == TRUE) {
    echo '<br>Tаблица towns е създадена';
} else {
    echo '<br>Грешка: ' . $conn->error;
}

$conn->close();