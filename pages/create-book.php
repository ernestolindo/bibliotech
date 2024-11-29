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
    <!-- 
        <form method="POST" action="">
            <label>Nombre Aerolinea</label>
            <input type="text" name="nombre">

            <label>Cantidad de aviones</label>
            <input type="text" name="cantAviones">

            <label>Tipo de aerolinea</label>
            <select name="tipoAerolinea" id="tipoAerolinea">
                <option value="comercial">Comercial</option>
                <option value="privado">Privado</option>
                <option value="carga">De carga</option>
            </select>

            <button type="submit" name="createForm">Registrar aerolinea</button>
        </form> 
    -->
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

        <button type="submit" name="createBookForm">Add book</button>
    </form>

    <script></script>
</body>

</html>