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
$students = array(
    array("name" => "Иван Иванов", "grade" => 4),
    array("name" => "Драган Драганов", "grade" => 5.45),
    array("name" => "Димо Петров", "grade" => 5.67)
);

echo "<ol>";
foreach ($students as $student) {
    echo "<li>Студент {$student['name']} има успех {$student['grade']}</li>";
}
echo "</ol>";

echo "<ul>";
foreach ($students as $student) {
    echo "<li>Студент {$student['name']} има успех {$student['grade']}</li>";
}
echo "</ul>";

echo "<table border='4'>";
echo "<tr><th>Име, Фамилия</th><th>Успех</th></tr>";
foreach ($students as $student) {
    echo "<tr><td>{$student['name']}</td><td>{$student['grade']}</td></tr>";
}
echo "</table>";
?>
</body>
</html>
