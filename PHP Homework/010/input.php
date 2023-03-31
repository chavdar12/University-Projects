<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2> Създаване на книга </h2>
<form method="post">
    <label for="title">Заглавие:</label><br>
    <input type="text" id="title" name="title" required><br>
    <label for="author">Автор:</label><br>
    <input type="text" id="author" name="author" required><br>
    <label for="publisher">Издателство:</label><br>
    <input type="text" id="publisher" name="publisher" required><br>
    <label for="year">Година на издаване:</label><br>
    <input type="number" id="year" name="year" required><br>
    <input type="submit" name="submit" value="Въведи"/>
</form>
<?php
include '../dbFiles/config.php';
if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($dbConn, $_POST['title']);
$author = mysqli_real_escape_string($dbConn, $_POST['author']);
$publisher = mysqli_real_escape_string($dbConn, $_POST['publisher']);
$year = mysqli_real_escape_string($dbConn, $_POST['year']);

$query = "INSERT INTO book (title, author, publisher, year) VALUES ('$title', '$author', '$publisher', '$year')";
$result = mysqli_query($dbConn, $query);

if ($result) {
    echo "<br> Добавен запис";
} else {
    die('<br> Грешка');
}
}
?>

</body>
</html>