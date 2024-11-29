<?php

/*
User
Represents a user of the library.
Attributes:

id
name
email
Methods:

register()
getDetails()
*/

class User

{
    private static $nextId = 1; // Static property to track the next ID
    private $id;
    private $name;
    private $email;

    function __construct($name, $email)
    {
        $this->id = self::$nextId++; // Assign current ID and increment the static counter
        $this->name = $name;
        $this->email = $email;
    }

    function register() {}
    function getDetails() {}

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
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
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
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
