<?php
$host = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'deliveryinfo';
$dbConn = mysqli_connect($host, $dbUser, $dbPass);

if (!$dbConn = mysqli_connect($host, $dbUser, $dbPass)) {
    die('Няма връзка със сървър');
}

if (!mysqli_select_db($dbConn, $dbName)) {
    die('Грешка при селектиране');
}
mysqli_query($dbConn, "SET NAMES 'UTF8'");