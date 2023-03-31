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
<FORM name="form" method="post">
    Find solution for ax^2 + bx + c <br/>
    a:
    <input type="number" name="a"/> <br/>
    b:
    <input type="number" name="b"/> <br/>
    c:
    <input type="number" name="c"/>
    <input type="submit" name="submit" value="Find x"/>
</FORM>
<?php
if (isset($_POST['submit'])) {
    [$a, $b, $c] = array_map('intval', [$_POST['a'], $_POST['b'], $_POST['c']]);
    $d = $b ** 2 - 4 * $a * $c;
    if ($d > 0) echo "x1 = ", number_format((- $b + sqrt($d)) / (2 * $a), 3), " <br> x2 = ", number_format((- $b - sqrt($d)) / (2 * $a), 3);
    elseif ($d === 0) echo "The r1 = r2 = ", number_format(- $b / (2 * $a), 3), ";\n";
    else echo "No real solutions";
}
?>
</body>
</html>
