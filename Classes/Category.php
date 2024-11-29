<?php

/*
Represents a book category.
Attributes:

id
name
Methods:

addCategory()
listCategories()
*/

class Category
{
    private static $nextId = 1; // Static property to track the next ID
    private $id;
    private $name;

    function __construct($name)
    {
        $this->id = self::$nextId++; // Assign current ID and increment the static counter
        $this->name = $name;
    }

    function addCategory() {}
    function listCategories() {}

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
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
}
