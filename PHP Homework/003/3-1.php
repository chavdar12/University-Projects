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
<?php
$x = 1;
echo "<ul>";
for ($i = 1; $i <= 10; $i++) {
    echo "<li>X = $x </li><br><ul><li>     X ^ 3 = " . pow($x, 3) . "</li><br></ul>";
    $x++;
}
echo "</ul>";
?>
</body>
</html>
