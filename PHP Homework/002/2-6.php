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
echo "x&emsp;square&emsp;squareRoot <br>";
$x = 1;
for ($i = 1; $i <= 12; $i++) {
    $square = round(pow($x, 2), 2);
    $squareRoot = round(sqrt($x), 2);
   echo "$x&emsp;$square&emsp;&emsp;$squareRoot <br>";
    $x++;
}
?>
</body>
</html>