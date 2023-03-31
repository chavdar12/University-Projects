<?php

class Person
{
    private $first_name;
    private $last_name;
    private $email;


    public function __construct($first_name, $last_name, $email)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
    }

    public function show_person(): string
    {
        return "My name is: " . $this->first_name . " " . $this->last_name . "<br>My email is: " . $this->email;
    }
}

