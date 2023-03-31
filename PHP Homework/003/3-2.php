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
for ($i = 0; $i < 9; $i++) {
    echo "abc ";
}
echo "<br>";
for ($i = 0; $i < 9; $i++) {
    echo "xyz ";
}
echo "<br>";
for ($j = 1; $j <= 9; $j++) {
    echo "$j ";
}
echo "<br>";
$items = array("Item A", "Item B", "Item C", "Item D", "Item E", "Item F");
foreach ($items as $key => $value) {
    echo ($key+1) . ". $value <br>";
}
?>
</body>
</html>