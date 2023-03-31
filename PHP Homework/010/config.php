<?php
$host = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'infobooks';
$dbConn = mysqli_connect($host, $dbUser, $dbPass, $dbName);

if (!$dbConn) {
    die('Няма връзка със сървър');
}

mysqli_query($dbConn, "SET NAMES 'UTF8'");
?>
