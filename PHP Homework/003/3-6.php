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
    сумата от цифрите равна на X (зададено от потребителя) <br/>
    Въведете число:
    <input type="number" name="a"/> <br/>
    <input type="submit" name="submit" value="GO"/>
</FORM>

<?php
function calculateDigitSum($num) {
    $sum = 0;
    while ($num != 0) {
        $sum = $sum + $num % 10;
        $num = $num / 10;
    }
    return $sum;
}

if (isset($_POST['submit'])) {
    $a = $_POST['a'];

    $sum = calculateDigitSum($a);
    echo "Сумата на цифрите на числото $a е равна на $sum <br>";
}
?>

<?php
$sum2 = 0;
$start = 1;
$end = 100;
for ($i = $start; $i <= $end; $i++) {
    $sum2 += $i;
}
echo "<br> Sum from 1 to 100 is $sum2";
?>
</body>
</html>
