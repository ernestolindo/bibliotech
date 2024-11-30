<?php

require "../Classes/Book.php";
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

if (isset($_GET['edit'])) {
    $book = getBookById($_GET['edit'], $books);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Book</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap");
    </style>
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>

<body style="background-color: #252525; color: #e0e0e0; font-family: 'Open Sans', serif">
    <h1>Edit Book</h1>
    <form action="./processes/edit-book-process.php?edit=<?php echo $book->getId(); ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $book->getId(); ?>">

        <label>Title</label>
        <input type="text" name="title" value="<?php echo $book->getTitle() ?>" required>

        <label>Author</label>
        <input type="text" name="author" value="<?php echo $book->getAuthor() ?>" required>

        <label>Category</label>
        <input type="text" name="category" value="<?php echo $book->getCategory() ?>" required>

        <!-- <label>Cover</label>
        <input type="file" name="cover" accept="image/*" required> -->

        <label>Current Cover</label>
        <div>
            <img src="<?php echo "../" . $book->getCover(); ?>" alt="Current Book Cover" style="max-width: 200px; max-height: 300px;">
        </div>

        <label>Upload New Cover (optional)</label>
        <input type="file" name="cover" accept="image/*">

        <label>Description</label>
        <textarea type="text" name="description" rows="4" required><?php echo $book->getDescription() ?></textarea>

        <button type="submit">Edit book</button>
    </form>
    <script></script>
</body>

</html>