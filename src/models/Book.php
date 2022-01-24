<?php

class Book
{
    private $title;
    private $summary;
    private $image;


    public function __construct($title, $summary, $image)
    {
        $this->title = $title;
        $this->summary = $summary;
        $this->image = $image;
    }


    public function getTitle():string
    {
        return $this->title;
    }


    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getSummary():string
    {
        return $this->summary;
    }


    public function setSummary(string $summary)
    {
        $this->summary = $summary;
    }


    public function getImage():string
    {
        return $this->image;
    }


    public function setImage(string $image)
    {
        $this->image = $image;
    }
}