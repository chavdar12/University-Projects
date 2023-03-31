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
require_once("data.php");
foreach ($people as $key => $hora) {
    $keyN = $place[$key];
    if ($keyN !== "") {
        $str = "Уважаеми (a), " . $hora['name'];
        $str .= "<br> Имаме удоволствието да Ви поканим на " . $events[$keyN];
        $str .= "<br>" . match ($keyN) {
            "i" => "Бъдете 10 минути преди откриването!",
            "p" => "Не забравяйте да донесете подарък!",
            "s" => "Моля, потвърдете Вашето участие по телефона!",
        };
        $str .= "<br>" . SIGN . "<hr>";
        echo $str;
    }
}
?>
</body>
</html>
