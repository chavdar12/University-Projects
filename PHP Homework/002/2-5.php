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
<FORM name="form" method="post" action="#">
    Enter the number:
    <input type="text" name="number"/> <br/>
    Enter the digit:
    <input type="text" name="digit"/> <br/>
    <input type="submit" name="submit" value="GO"/>
</FORM>
<?php
if (isset($_POST['submit'])) {
    $number = $_POST['number'];
    $digit = $_POST['digit'];

    $count = substr_count($number, $digit);
    echo "The number contains $count times digit $digit";
}
?>
</body>
</html>