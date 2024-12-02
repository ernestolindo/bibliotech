<?php

if (!isset($_GET['id'])) {
    exit("ID not found");
}

require "../../Classes/Book.php";
session_start();

if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = [];
}

$books = $_SESSION['books'];

function getBookById($id, $books)
{
    foreach ($books as $book) {
        if ($book->getId() == $id) {
            return $book;
        }
    };
}

$book = getBookById($_GET['id'], $books);

// Update book details
$book->setIsAvailable(false);

// Redirect to the books list
header("Location: ../../index.php");
