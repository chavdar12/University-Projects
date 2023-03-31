<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<form name="form" method="post">
    <label for="first_name">First name:</label>
    <input type="text" name="first_name" id="first_name" required>
    <label for="last_name">Last name:</label>
    <input type="text" name="last_name" id="last_name" required>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <input type="submit" name="submit" value="Create and show">
</form>
<?php
include 'Person.php';
if (isset($_POST['submit']) and isset($_POST['first_name']) and isset($_POST['last_name']) and isset($_POST['email'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    // Validate email address
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $per = new Person($first_name, $last_name, $email);
        echo $per->show_person();
    } else {
        echo "Invalid email address!";
    }
}
?>
</body>
</html>
