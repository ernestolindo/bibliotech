<?php

if (!isset($_GET['delete'])) {
    exit("Delete ID not found");
}

require "../../Classes/Book.php";
session_start();

if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = [];
}

$books = $_SESSION['books'];

foreach ($books as $key => $book) {
    if ($book->getId() == $_GET['delete']) {
        unset($books[$key]);

        $oldCover = "../../" . $book->getCover();
        if (is_file($oldCover)) {
            unlink($oldCover);
        }
        break; // salir del bucle
    }
};
$_SESSION['books'] = $books;

// echo "<pre>";
// print_r($books);
// echo "</pre>";

header('Location: ../../index.php');
