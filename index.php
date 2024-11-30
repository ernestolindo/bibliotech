<?php
require "Classes/Book.php";
session_start();

if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = [];
}

$books = $_SESSION['books'];
// echo "<pre>";
// print_r($books);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bibliotech</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap");
    </style>
</head>

<body style="background-color: #252525; color: #e0e0e0; font-family: 'Open Sans', serif">
    <header class="header">
        <h1 class="header__title">Bibliotech</h1>
    </header>
    <aside class="sidebar">
        <h2 class="sidebar__welcome">Welcome, User1</h2>
        <a class="sidebar__button">Change to User2</a>
        <a class="sidebar__button">Change to User3</a>
        <a class="sidebar__button">Create New Account</a>
    </aside>

    <main class="main">

        <h2 class="main__title">Gestión de Libros</h2>

        <section id="books-menu">
            <a class="books-menu__button" href="./pages/create-book.php">Añadir Libro</a>
            <a class="books-menu__button" href="#">Filtrar por categoria</a>
        </section>

        <section class="books">


            <?php foreach ($books as $book) : ?>
                <article class="book">
                    <section class="book-info">
                        <h3 class="book-info__title"><?php echo $book->getTitle(); ?></h3>
                        <em class="book-info__author">By <?php echo $book->getAuthor(); ?></em> | <strong class="book-info__category"><?php echo $book->getCategory(); ?></strong>
                        <img class="book-info__cover" src="<?php echo $book->getCover(); ?>" alt="Book cover" width="50px">
                        <p class="book-info__description"><?php echo $book->getDescription(); ?></p>
                    </section>
                    <section class="book-actions">
                        <a class="book-actions__button" href="pages/edit-book.php?edit=<?php echo $book->getId(); ?>">Edit book</a>
                        <a class="book-actions__button" href="pages/processes/delete-book-process.php?delete=<?php echo $book->getId(); ?>">Delete book</a>
                        <a class="book-actions__button" href="?return=<?php echo $book->getId(); ?>">Return book</a>
                    </section>
                </article>
            <?php endforeach ?>

        </section>

    </main>
    <footer>
        <p>&copy; 2024 Bibliotech. Todos los derechos reservados.</p>
    </footer>
    <script src="./assets/scripts/script.js"></script>
</body>

</html>