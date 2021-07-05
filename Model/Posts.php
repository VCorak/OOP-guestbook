<?php

class Posts {

    private $title;
    private $date;
    private $content;
    private $name;

    public function __construct($title, $date, $content, $name) {

        $this->title = $title;
        $this->date = $date;
        $this->content = $content;
        $this->name = $name;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getContent()
    {
        return $this->content;
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function createPostsArray($title, $date, $content, $name) : array {
        return ['title' => $this->getTitle(), 'date' => $this->getDate(), 'content' => $this->getContent(), 'name' => $this->getName()];
    }
}