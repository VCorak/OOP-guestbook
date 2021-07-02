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

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function createPostsArray($title, $date, $content, $name) : array {
        return ['title' => $this->getTitle(), 'date' => $this->getDate(), 'content' => $this->getContent(), 'name' => $this->getName()];
    }
}