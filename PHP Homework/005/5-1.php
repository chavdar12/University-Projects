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
<p> ЛИЦЕ НА ПРАВОЪГЪЛНИK
<FORM name="form" method="post" action="#">
    Въведете дължина и ширина на правоъгълник:<br>
    Дължина:
    <input type="number" name="l"/>
    Ширина:
    <input type="number" name="w"/> <br/>
    <input type="submit" name="submit" value="GO!"/>
</FORM>

<?php
if (isset($_POST['submit'])) {
    $l = $_POST['l'];
    $w = $_POST['w'];

    $area = $w * $l;

    echo "<span style=\"color:chucknorris;\">Лице на правоъгълник</span><br>";
    echo "<span style=\"color:chucknorris;\">Правоъгълник с дължина $l и ширина $w има лице " . $w * $l . "</span>";
}

?>
</body>
</html>
