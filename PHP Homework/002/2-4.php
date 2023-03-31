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
echo "Днес е: " . date("d/m/Y") . "<br>";
echo (date("d/m/Y") > date("d/8/Y")) ? "Август е, и е наистина горещо." : "Не е август, така че поне не е горещо!";
?>

</body>
</html>