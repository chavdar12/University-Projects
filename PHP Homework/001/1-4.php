<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="name">Please enter your name:</label>
        <input type="text" name="name" id="name">
        <button type="submit" name="submit">Go</button>
    </form>
    <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            echo "Your name is $name";
        }
    ?>
</body>
</html> 