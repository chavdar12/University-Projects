<?php

class Article
{
    private $title;
    private $author;
    private $description;

    public function __construct($title, $author, $description)
    {
        $this->title = $title;
        $this->author = $author;
        $this->description = $description;
    }

    public function show_article(): string
    {
        return "Article<br>Title: " . $this->title . "<br>Author: " . $this->author . "<br>Description: " . $this->description;
    }

}