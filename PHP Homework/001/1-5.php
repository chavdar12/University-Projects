<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="name">Вашето име:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="age">Възраст:</label><br>
        <input type="number" id="age" name="age"><br><br>
        <input type="submit" name="submit" value="Изпрати!">
    </form>
    <?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    echo "Здравейте, $name!<br> Вие сте на $age години.";
}
?>
</body>
</html>