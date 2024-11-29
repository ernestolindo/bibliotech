<?php

/*
Book
Represents a book in the library.
Attributes:

id (unique identifier)
title
author
category
isAvailable (true/false for loan status)
Methods:

addBook()
editBook()
deleteBook()
getDetails()
*/

class Book
{
    private static $nextId = 1; // Static property to track the next ID
    private $id;
    private $title;
    private $author;
    private $category;
    private $cover;
    private $description;
    private $isAvailable;

    function __construct($title, $author, $category, $cover, $description)
    {
        $this->id = self::$nextId++; // Assign current ID and increment the static counter
        $this->title = $title;
        $this->author = $author;
        $this->category = $category;
        $this->cover = $cover;
        $this->description = $description;
        $this->isAvailable = true;
    }

    function addBook() {}
    function editBook() {}
    function deleteBook() {}
    function getDetails() {}

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the value of author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Get the value of category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get the value of cover
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of isAvailable
     */
    public function getIsAvailable()
    {
        return $this->isAvailable;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Set the value of cover
     *
     * @return  self
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set the value of isAvailable
     *
     * @return  self
     */
    public function setIsAvailable($isAvailable)
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }
}
