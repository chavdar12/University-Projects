<?php
include './db/config.php';

$sql = "CREATE TABLE IF NOT EXISTS guest.guestbook (
id INT(4) NOT NULL AUTO_INCREMENT,
name VARCHAR(65) NOT NULL,
email VARCHAR(65) NOT NULL,
comment VARCHAR(65) NOT NULL,
datetime TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`id`));";

if ($dbConn->query($sql) == TRUE) {
    echo '<br>БД и таблица guestbook са създадени<br>';
} else {
    echo '<br>Грешка: ' . $dbConn->error;
}
$dbConn->close();
?>