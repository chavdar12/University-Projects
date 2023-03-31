<?php
$array5 = array_filter($array, fn($num) => $num % 5 === 0);
echo "Кратни на 5 числа: " . implode(", ", $array5);

$filtered = array_filter($array5, fn($num) => $num !== null && $num !== '');
$product = array_product($filtered);
echo "<br>Произведение = $product";

echo "<br><br>Елементи на масива, по-големи от своите съседи:<br><br>";
for ($j = 1; $j < count($array5) - 1; $j++) {
    if ($array5[$j] > $array5[$j + 1] && $array5[$j] > $array5[$j - 1]) {
        echo "$array5[$j]<br>";
    }
}
?>
