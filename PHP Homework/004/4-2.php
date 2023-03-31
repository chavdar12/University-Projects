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
$cities = array("Tokyo", "Mexico City", "New York", "Mumbai", "Seoul", "Shanghai", "Lagos", "Buenos Aires", "Cairo", "London");

// Print cities comma-separated
echo implode(", ", $cities);

// Sort and print cities in an unordered list
sort($cities);
echo "<ul>";
foreach ($cities as $value2) {
    echo "<li>$value2</li>";
}
echo "</ul>";

// Add new cities and print them in an ordered list with keys
$cities = array_merge($cities, array("Los Angeles", "Calcutta", "Osaka", "Beijing"));
sort($cities);
echo "<ol>";
foreach ($cities as $value3) {
    echo "<li>$value3</li>";
}
echo "</ol>";

// Print cities in a table with keys
echo "<table border='4'>";
echo "<tr><th>key</th><th>value</th></tr>";
foreach ($cities as $key => $value4) {
    echo "<tr><td>$key</td><td>$value4</td></tr>";
}
echo "</table>";
?>

</body>
</html>