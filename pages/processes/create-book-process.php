<?php
// session_start(); // Start or resume the session
// $_SESSION = []; // Set the $_SESSION array to an empty array

require "../../Classes/Book.php";
session_start();

if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = [];
}

$books = $_SESSION['books'];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit("Error: Return to the form page and try again.");
}
echo "Hi from the Create Book Process <br>";

if (isset($_FILES['cover']) && $_FILES['cover']['error'] !== UPLOAD_ERR_OK) {
    echo "No file uploaded or an error occurred. <br>";
}

$file = $_FILES['cover'];

echo "File name: " . $file['name'] . "<br>";
echo "File type: " . $file['type'] . "<br>";
echo "Temporary path: " . $file['tmp_name'] . "<br>";
echo "File size: " . $file['size'] . " bytes<br>";

// Set the target directory
$targetDir = "assets/uploads/";
$targetFile = $targetDir . basename($file['name']);
$relativeTargetFile = "../../" . $targetDir . basename($file['name']);;

// Validate file type (optional)
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
if (!in_array($file['type'], $allowedTypes)) {
    echo "Invalid file type.";
    exit;
}

// Validate file size (optional, e.g., max 2MB)
$maxFileSize = 2 * 1024 * 1024; // 2MB
if ($file['size'] > $maxFileSize) {
    echo "File is too large.";
    exit;
}

// Move the uploaded file to the target directory
if (!is_dir($relativeTargetFile)) {
    mkdir($relativeTargetFile, 0755, true); // Create the directory if it doesn't exist
}

if (move_uploaded_file($file['tmp_name'], $relativeTargetFile)) {
    echo "File uploaded successfully: " . $relativeTargetFile . "<br>";
} else {
    echo "Failed to upload the file. <br>";
}

if (isset($_POST['title'], $_POST['author'], $_POST['category'], $_POST['description'])) {
    $newBook = new Book(count($books) + 1, $_POST['title'], $_POST['author'], $_POST['category'], $targetFile, $_POST['description']);
    echo "ID: " . $newBook->getId() . "<br>";
    echo "Title: " . $newBook->getTitle() . "<br>";
    echo "Author: " . $newBook->getAuthor() . "<br>";
    echo "Category: " . $newBook->getCategory() . "<br>";
    echo "Cover: " . $newBook->getCover() . "<br>";
    echo "Description: " . $newBook->getDescription() . "<br>";
    echo "Available: " . $newBook->getIsAvailable() . "<br>";
}

echo "Hey, do you like the book's details?. <br>";

array_push($books, $newBook);

$_SESSION['books'] = $books;

header('Location: ../../index.php');
