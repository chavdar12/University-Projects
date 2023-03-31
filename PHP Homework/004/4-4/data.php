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
define("SIGN", "С уважение, Деан Иванов");
$events = array("i" => "открито изложение", "p" => "бал на випускниците", "s" => "ден на отворените врати");
$people = array("ivan" => array("name" => "Иван Иванов"),
    "petar" => array("name" => "Петър Пертов"),
    "simeon" => array("name" => "Симеон Семов"));
$place["ivan"] = "i";
$place["petar"] = "p";
$place["simeon"] = "s";
