<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit("Error: Return to the form page and try again.");
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

if (!isset($_GET['edit'])) {
    exit("Edit ID not found");
}
$book = getBookById($_GET['edit'], $books);

// Update book details
$title = $_POST['title'];
$author = $_POST['author'];
$category = $_POST['category'];
$description = $_POST['description'];
$cover = $book->getCover(); // Default to the current cover

// Handle new cover upload
if (isset($_FILES['cover']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['cover'];
    $targetDir = "assets/uploads/";
    $targetFile = $targetDir . basename($file['name']);
    $relativeTargetFile = "../../" . $targetFile;

    // Validate file type
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($file['type'], $allowedTypes)) {
        exit("Invalid file type.");
    }

    // Validate file size
    $maxFileSize = 2 * 1024 * 1024; // 2MB
    if ($file['size'] > $maxFileSize) {
        exit("File is too large.");
    }

    // Move the uploaded file
    if (!is_dir($relativeTargetFile)) {
        mkdir(dirname($relativeTargetFile), 0755, true);
    }

    if (move_uploaded_file($file['tmp_name'], $relativeTargetFile)) {
        $oldCover = "../../" . $book->getCover();
        if (is_file($oldCover)) {
            unlink($oldCover);
        }


        $cover = $targetFile; // Update the cover path if the new file is uploaded
    } else {
        exit("Failed to upload the new cover.");
    }
}

// Update book details in the session
$book->setTitle($title);
$book->setAuthor($author);
$book->setCategory($category);
$book->setDescription($description);
$book->setCover($cover);

echo "<pre>";
print_r($books);
echo "</pre>";

// $_SESSION['books'] = $books;

// Redirect to the books list
header("Location: ../../index.php");
