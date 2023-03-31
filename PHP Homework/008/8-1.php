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

class Books
{
    private $title;
    private $author;
    private $price;

    function __construct($title, $author, $price)
    {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    function show_books(): void
    {
        $book = "Kнига: " . $this->title . " , " . $this->author . " , " . $this->price;
        echo "$book";
    }
}

$newBook = new Books("PHP and MySQL", "Иван Иванов", "12 лв.");
$newBook->show_books();

?>
</body>
</html>