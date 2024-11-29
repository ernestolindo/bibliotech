<?php

/*
Library
Manages overall library operations.
Attributes:

books (array of Book objects)
authors (array of Author objects)
categories (array of Category objects)
Methods:

searchBooks($query)
listAvailableBooks()
loanBook($bookId, $userId)
returnBook($bookId)
*/

class Library
{
    private $books;
    private $authors;
    private $categories;

    function __construct($books, $authors, $categories)
    {
        $this->books = $books;
        $this->authors = $authors;
        $this->categories = $categories;
    }

    function searchBooksByCategory($category) {}
    function listAvailableBooks() {}
    function loanBook($bookId, $userId) {}
    function returnBook($bookId) {}

    /**
     * Get the value of books
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * Get the value of authors
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * Get the value of categories
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set the value of books
     *
     * @return  self
     */
    public function setBooks($books)
    {
        $this->books = $books;

        return $this;
    }

    /**
     * Set the value of authors
     *
     * @return  self
     */
    public function setAuthors($authors)
    {
        $this->authors = $authors;

        return $this;
    }

    /**
     * Set the value of categories
     *
     * @return  self
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;

        return $this;
    }
}
