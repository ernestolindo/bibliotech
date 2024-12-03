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
    <script src="https://kit.fontawesome.com/9cc216c7fb.js" crossorigin="anonymous"></script>
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

                    <?php
                    $categories = []; // Array to store unique categories

                    foreach ($books as $book) :
                        $category = $book->getCategory(); // Get the category of the current book

                        // Check if the category is not already in the array
                        if (!in_array($category, $categories)) {
                            $categories[] = $category; // Add category to the array 
                    ?>
                            <option class="select__option" value="<?php echo $book->getCategory(); ?>"><?php echo $book->getCategory(); ?></option>
                    <?php }
                    endforeach ?>
                </select>
                <button class="button" type="submit">Appy</button>
            </form>
        </section>

        <section class="books container">

            <?php
            if (isset($_GET['category'])) {
                // echo "Category is selected <br>";
                $category = $_GET['category'];

                // echo "The selected category is $category <br>";
                foreach ($books as $book) :
                    if ($book->getCategory() === $category) { ?>
                        <article class="book">
                            <div class="book__title">

                                <h3>
                                    <?php echo $book->getTitle(); ?>
                                </h3>
                                <?php if ($book->getIsAvailable()) { ?>
                                    <em class="available">Available</em>
                                <?php } else { ?>
                                    <em class="not-available">Not Available</em>
                                <?php } ?>
                            </div>
                            <img class="book__cover" src="<?php echo $book->getCover(); ?>" alt="Book cover" width="50px">
                            <div class="book__details">

                                <em>By <?php echo $book->getAuthor(); ?></em> | <strong class="book-info__category"><?php echo $book->getCategory(); ?></strong>
                                <p><?php echo $book->getDescription(); ?></p>
                            </div>
                            <section class="book__actions actions">
                                <div class="icons">
                                    <a class="actions__button button" href="pages/edit-book.php?edit=<?php echo $book->getId(); ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a class="actions__button button" href="pages/processes/delete-book-process.php?delete=<?php echo $book->getId(); ?>"><i class="fa-solid fa-trash"></i></a>
                                </div>
                                <?php if ($book->getIsAvailable()) { ?>
                                    <a class="actions__button actions__button--loan button" href="pages/processes/request-loan-process.php?id=<?php echo $book->getId(); ?>">Request Loan</a>
                                <?php } else { ?>
                                    <a class="actions__button actions__button--loan button" href="pages/processes/return-book-process.php?id=<?php echo $book->getId(); ?>">Return</a>
                                <?php } ?>
                            </section>
                        </article>
                    <?php   }
                endforeach;
            } else {
                foreach ($books as $book) : ?>
                    <article class="book">
                        <div class="book__title">

                            <h3>
                                <?php echo $book->getTitle(); ?>
                            </h3>
                            <?php if ($book->getIsAvailable()) { ?>
                                <em class="available">Available</em>
                            <?php } else { ?>
                                <em class="not-available">Not Available</em>
                            <?php } ?>
                        </div>
                        <img class="book__cover" src="<?php echo $book->getCover(); ?>" alt="Book cover" width="50px">
                        <div class="book__details">

                            <em>By <?php echo $book->getAuthor(); ?></em> | <strong class="book-info__category"><?php echo $book->getCategory(); ?></strong>
                            <p><?php echo $book->getDescription(); ?></p>
                        </div>
                        <section class="book__actions actions">
                            <div class="icons">
                                <a class="actions__button button" href="pages/edit-book.php?edit=<?php echo $book->getId(); ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a class="actions__button button" href="pages/processes/delete-book-process.php?delete=<?php echo $book->getId(); ?>"><i class="fa-solid fa-trash"></i></a>
                            </div>
                            <?php if ($book->getIsAvailable()) { ?>
                                <a class="actions__button actions__button--loan button" href="pages/processes/request-loan-process.php?id=<?php echo $book->getId(); ?>">Request Loan</a>
                            <?php } else { ?>
                                <a class="actions__button actions__button--loan button" href="pages/processes/return-book-process.php?id=<?php echo $book->getId(); ?>">Return</a>
                            <?php } ?>
                        </section>
                    </article>
            <?php
                endforeach;
            } ?>



        </section>

    </main>
    <footer class="footer">
        <div class="footer-container container">

            <p>&copy; 2024 Bibliotech. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>