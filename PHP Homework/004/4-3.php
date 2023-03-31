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
    <h2>Please enter your information:</h2>
    <form name="form" method="post" action="#">
        City<br>
        <input type="text" name="city"><br>
        Month<br>
        <input type="text" name="month"><br>
        Year<br>
        <input type="number" name="year"><br>
        <p>Please choose the kinds of weather you experienced from the list below.<br>
        <p>Choose all that apply.<br>
        <input type="checkbox" name="weather[]" value="sunshine">Sunshine<br>
        <input type="checkbox" name="weather[]" value="clouds">Clouds<br>
        <input type="checkbox" name="weather[]" value="rain">Rain<br>
        <input type="checkbox" name="weather[]" value="hail">Hail<br>
        <input type="checkbox" name="weather[]" value="sleet">Sleet<br>
        <input type="checkbox" name="weather[]" value="snow">Snow<br>
        <input type="checkbox" name="weather[]" value="wind">Wind<br>
        <input type="checkbox" name="weather[]" value="cold">Cold<br>
        <input type="checkbox" name="weather[]" value="heat">Heat<br>
        <input type="submit" name="submit" value="GO"><br>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $city = $_POST['city'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $weather = $_POST['weather'];

        $inputLocal = "In $city in the month of $month $year, you observed the following weather: " . implode(", ", $weather);
        echo $inputLocal;
    }
    ?>
</body>
</html>
