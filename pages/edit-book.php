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
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>

<body>
    <header class="header">
        <div class="header-container container">

            <h1 class="header-container__title">Bibliotech</h1>
        </div>
    </header>
    <main class="main">
        <div class="main-container container">
            <h1 class="main-title">Edit Book</h1>
            <form class="form" action="./processes/edit-book-process.php?edit=<?php echo $book->getId(); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $book->getId(); ?>">
                <div class="form__title">
                    <label class="form__label">Title</label>
                    <input class="form__input" type="text" name="title" value="<?php echo $book->getTitle() ?>" required>

                </div>
                <div class="form__author">
                    <label class="form__label">Author</label>
                    <input class="form__input" type="text" name="author" value="<?php echo $book->getAuthor() ?>" required>

                </div>
                <div class="form__category">
                    <label class="form__label">Category</label>
                    <input class="form__input" type="text" name="category" value="<?php echo $book->getCategory() ?>" required>

                </div>
                <div class="form__cover">
                    <label class="form__label">Upload New Cover (optional)</label>
                    <input class="form__input" type="file" name="cover" accept="image/*">

                </div>
                <div class="form__description">
                    <label class="form__label">Description</label>
                    <textarea class="form__input form__input--textarea" type="text" name="description" rows="4" required><?php echo $book->getDescription() ?></textarea>

                </div>

                <button class="form__submit button" type="submit">Edit book</button>
            </form>
        </div>
    </main>
    <footer class="footer">
        <div class="footer-container container">

            <p>&copy; 2024 Bibliotech. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>