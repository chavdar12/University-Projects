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
    Enter the number of month: <br/>
    <input type="number" name="a"/> <br/>
    <input type="submit" name="submit" value="GO"/>
</FORM>
<?php
if (isset($_POST['submit'])) {
    $a = $_POST['a'];

    switch ($a) {
        case 2:
        case 12:
        case 1:
            $result = "winter";
            break;
        case 4:
        case 5:
        case 3:
            $result = "spring";
            break;
        case 7:
        case 8:
        case 6:
            $result = "summer";
            break;
        case 10:
        case 11:
        case 9:
            $result = "autumn";
            break;
        default:
            $result = "";
    }

    if ($result !== "") {
        echo "The result is: $result";
    }
}
?>
</body>
</html>
