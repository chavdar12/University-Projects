<?php
$host = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'guest';
$tableName = 'guestbook';

// Connect to database
$dbConn = mysqli_connect($host, $dbUser, $dbPass, $dbName);

// Check for errors
if (!$dbConn) {
    die('Грешка при връзка със сървър: ' . mysqli_connect_error());
}

// Set charset
mysqli_set_charset($dbConn, 'UTF8');
