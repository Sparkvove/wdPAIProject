<?php

class Book
{
    private $title;
    private $summary;
    private $image;
    private $id;


    public function __construct($title, $summary, $image, $id = null)
    {
        $this->title = $title;
        $this->summary = $summary;
        $this->image = $image;
        $this->id = $id;
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


    public function getId()
    {
        return $this->id;
    }


    public function setId($id): void
    {
        $this->id = $id;
    }


}