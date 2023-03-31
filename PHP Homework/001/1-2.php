<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="num1">Enter first number:</label>
        <input type="number" name="num1" id="num1"><br>
        <label for="num2">Enter second number:</label>
        <input type="number" name="num2" id="num2"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        echo "Първото число е: $num1 второто число е: $num2";
    }
    ?>
</body>
</html>