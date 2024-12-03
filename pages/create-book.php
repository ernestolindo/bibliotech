<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add a book</title>
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
            <h1 class="main-title">Add a book</h1>
            <form class="form" action="./processes/create-book-process.php" method="POST" enctype="multipart/form-data">
                <div class="form__title">

                    <label class="form__label">Title</label>
                    <input class="form__input" type="text" name="title" required>
                </div>
                <div class="form__author">
                    <label class="form__label">Author</label>
                    <input class="form__input" type="text" name="author" required>

                </div>

                <div class="form__category">
                    <label class="form__label">Category</label>
                    <input class="form__input" type="text" name="category" required>
                </div>


                <div class="form__cover">
                    <label class="form__label">Cover</label>
                    <input class="form__input" type="file" name="cover" accept="image/*" required>
                </div>


                <div class="form__description">
                    <label class="form__label">Description</label>
                    <textarea class="form__input form__input--textarea" type="text" name="description" required></textarea>
                </div>


                <button class="form__submit button" type="submit">Add book</button>
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