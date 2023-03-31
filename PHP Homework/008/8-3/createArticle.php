<?php
require 'Article.php';

if (isset($_POST['submit']) && !empty($_POST['titl']) && !empty($_POST['aut']) && !empty($_POST['description'])) {
    $title = htmlspecialchars($_POST['titl'], ENT_QUOTES);
    $author = htmlspecialchars($_POST['aut'], ENT_QUOTES);
    $description = htmlspecialchars($_POST['description'], ENT_QUOTES);

    $art = new Article($title, $author, $description);
    echo $art->show_article();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form name="form" method="post">
        <label for="titl">Title:</label><br>
        <input type="text" name="titl" id="titl"><br>
        <label for="aut">Author:</label><br>
        <input type="text" name="aut" id="aut"><br>
        <label for="description">Description:</label><br>
        <textarea name="description" id="description"></textarea><br>
        <input type="submit" name="submit" value="Create and show"><br>
    </form>
</body>
</html>
