<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="age">Please enter your age:</label><br>
        <input type="number" name="age" id="age"><br>
        <label for="price">Please enter the price:</label><br>
        <input type="number" name="price" id="price"><br>
        <input type="submit" name="submit" value="Go">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $age = $_POST['age'];
        $price = $_POST['price'];

        if ($age <= 6 || $age >= 65) {
            $price = $price / 2;
        }

        echo "Your age is $age. The price is $$price";
    }
    ?>
</body>
</html>
