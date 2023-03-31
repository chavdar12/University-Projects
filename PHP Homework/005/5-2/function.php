<?php
function calculateTriangleArea(float $side1, float $side2, float $side3): float
{
    $p = ($side1 + $side2 + $side3) / 2;
    $s = sqrt($p * ($p - $side1) * ($p - $side2) * ($p - $side3));

    return $s;
}

if (isset($_POST['submit'])) {
    $side1 = (float) $_POST['a'];
    $side2 = (float) $_POST['b'];
    $side3 = (float) $_POST['c'];

    $area = calculateTriangleArea($side1, $side2, $side3);

    switch (true) {
        case $side1 == $side2 && $side2 == $side3:
            $triangleType = "равностранен";
            break;
        case $side1 == $side2 || $side1 == $side3 || $side2 == $side3:
            $triangleType = "равнобедрен";
            break;
        default:
            $triangleType = "разностранен";
            break;
    }

    include './check.php';
}
?>
