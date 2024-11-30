<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add a book</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap");
    </style>
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>

<body style="background-color: #252525; color: #e0e0e0; font-family: 'Open Sans', serif">
    <h1>Add a book</h1>
    <form action="./processes/create-book-process.php" method="POST" enctype="multipart/form-data">
        <label>Title</label>
        <input type="text" name="title" required>

        <label>Author</label>
        <input type="text" name="author" required>

        <label>Category</label>
        <input type="text" name="category" required>

        <label>Cover</label>
        <input type="file" name="cover" accept="image/*" required>

        <label>Description</label>
        <textarea type="text" name="description" rows="4" required></textarea>

        <button type="submit">Add book</button>
    </form>
    <p>
        Don Quixote <br>
        Miguel de Cervantes <br>
        Classics <br>
        The story of Alonso Quixano, a middle-aged man who loses his sanity due to
        reading too many chivalric romances and decides to become a knight named Don Quixote.
    </p>
    <p>
        The Lord of the Rings <br>
        J.R.R. Tolkien <br>
        Fantasy <br>
        A hobbit named Frodo inherits the One Ring, which can destroy the entire world.
        With the recently reawakened evil, being Sauron, going after the Ring
        to cement his reign, Frodo joins with eight others to destroy the Ring and defeat Sauron.
    </p>
    <p>
        To Kill a Mockingbird <br>
        Harper Lee <br>
        Non-Fiction <br>
        A historical overview of human evolution and civilization, addressing how humans
        became the dominant species and shaped their societies, economies, and cultures.
    </p>

    <script></script>
</body>

</html>