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
    <link rel="stylesheet" href="./assets/styles/style.css">
</head>

<body>
    <header class="header">
        <div class="header-container container">

            <h1 class="header-container__title">Bibliotech</h1>
            <a class="header-container__button button" href="./pages/create-book.php">Add book</a>
        </div>
    </header>

    <main class="main">
        <section class="main-menu container">
            <h2 class="main-menu__title">Books</h2>

            <form action="" method="get" class="main-menu__form">
                <label class="select__label" for="category">Filter by category</label>
                <select class="select" name="category" id="category">
                    <option class="select__option" value="All" disabled selected>All</option>
                    <option class="select__option" value="Classics">Classics</option>
                    <option class="select__option" value="Fiction">Fiction</option>
                </select>
                <button class="button" type="submit">Appy</button>
            </form>
        </section>

        <section class="books container">

            <?php
            if (isset($_GET['category'])) {
                echo "Category is selected <br>";
                $category = $_GET['category'];

                echo "The selected category is $category <br>";
                foreach ($books as $book) :
                    if ($book->getCategory() === $category) { ?>
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
                    <?php   }
                endforeach;
            } else {
                foreach ($books as $book) : ?>
                    <article class="book">
                        <section class="book-info">
                            <div class="book-info__title">

                                <h3>
                                    <?php echo $book->getTitle(); ?>
                                </h3>
                                <?php if ($book->getIsAvailable()) { ?>
                                    <em class="available">Available</em>
                                <?php } else { ?>
                                    <em class="not-available">Not Available</em>
                                <?php } ?>
                            </div>
                            <img class="book-info__cover" src="<?php echo $book->getCover(); ?>" alt="Book cover" width="50px">
                            <div class="book-info__details">

                                <em class="book-info__author">By <?php echo $book->getAuthor(); ?></em> | <strong class="book-info__category"><?php echo $book->getCategory(); ?></strong>
                                <p class="book-info__description"><?php echo $book->getDescription(); ?></p>
                            </div>
                        </section>
                        <section class="book-actions">
                            <a class="book-actions__button" href="pages/edit-book.php?edit=<?php echo $book->getId(); ?>">Edit book</a>
                            <a class="book-actions__button" href="pages/processes/delete-book-process.php?delete=<?php echo $book->getId(); ?>">Delete book</a>
                            <?php if ($book->getIsAvailable()) { ?>
                                <a class="book-actions__button" href="pages/processes/request-loan-process.php?id=<?php echo $book->getId(); ?>">Request Loan</a>
                            <?php } else { ?>
                                <a class="book-actions__button" href="pages/processes/return-book-process.php?id=<?php echo $book->getId(); ?>">Mark as Returned</a>
                            <?php } ?>
                        </section>
                    </article>
            <?php
                endforeach;
            } ?>



        </section>

    </main>
    <footer>
        <div class="container">

            <p>&copy; 2024 Bibliotech. All Rights Reserved.</p>
        </div>
    </footer>
    <script src="./assets/scripts/script.js"></script>
</body>

</html>