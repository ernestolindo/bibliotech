<?php

class Author
{
    private static $nextId = 1; // Static property to track the next ID
    private $id;
    private $name;
    private $biography;

    public function __construct($name, $biography)
    {
        $this->id = self::$nextId++; // Assign current ID and increment the static counter
        $this->name = $name;
        $this->biography = $biography;
    }

    function addAuthor() {}
    function getAuthorDetails() {}

    // Getter for ID
    public function getId()
    {
        return $this->id;
    }

    // Getter for Name
    public function getName()
    {
        return $this->name;
    }

    // Getter for Biography
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the value of biography
     *
     * @return  self
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }
}
