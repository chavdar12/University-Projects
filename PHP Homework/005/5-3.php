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
$niz1 = "Student Ivan Ivanov has excellent grade in WEB applications discipline.";
$niz2 = "Ivan Petrov has excellent grade in WEB applications.";
$j = strlen($niz1);
$k = strlen($niz2);

echo "Низ 1 има дължина: $j символа. &nbsp;";
echo "Низ 2 има дължина: $k символа.<br>";
echo "Двата низа имат общо: " . ($k + $j) . " символа.<br>";

if (strpos($niz1, 'Ivanov') !== false) {
    echo "Ivanov е намерен в Низ 1.<br>";
} else {
    echo "Иванов не е намерен в Низ 1.<br>";
}

$part1 = explode(" ", $niz1);
$part2 = explode(" ", $niz2);
echo "Низ 1 на части:<br>";
print_r($part1);
echo "<br>";
echo "Низ 2 на части:<br>";
print_r($part2);
echo "<br>";

$replace = str_replace("discipline", "subject", $niz1);
echo "$replace<br>";

if (strtolower($niz1) === strtolower($niz2)) {
    echo "Низовете са равни";
} else if (strtolower($niz1) > strtolower($niz2)) {
    echo "Низ 1 е по-голям от Низ 2";
} else {
    echo "Низ 2 е по-голям от Низ 1";
}
?>

</body>
</html>