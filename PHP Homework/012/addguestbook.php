<?php
include './db/config.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    if (!empty($name) && !empty($email) && !empty($comment)) {
        $sql = "INSERT INTO guest.guestbook (name, email, comment) VALUES('$name', '$email', '$comment')";

        if (mysqli_query($dbConn, $sql)) {
            echo "<br> Добавен запис";
        } else {
            die('<br> Грешка');
        }
    } else {
        echo "<br> без празни полета";
    }
}
?>
