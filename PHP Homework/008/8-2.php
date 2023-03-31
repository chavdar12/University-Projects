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

class Person
{
    protected $first_name;
    protected $last_name;

    public function __construct($first_name, $last_name)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    public function show_person()
    {
        $nperson = "My name is, " . $this->first_name . " " . $this->last_name . "!";
        echo "$nperson";
    }
}

class Programmer extends Person
{
    private $langs;
    public function set_lang()
    {
        $langs = array("Lisp", "Java");
        array_push($langs, "PHP");
        echo "<br>I know also " . end($langs) . ".<br>";
        print_r($langs);
    }
}

echo "Hello! <br>";
$newProgram = new Programmer("Ivan", "Ivanov");
$newProgram->show_person();
$newProgram->set_lang();


?>
</body>
</html>