<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Buscar productos</h1>
    <form action="search.php" method="post">
        <input type="text" name="product" id="">
        <input type="submit" value="Buscar">
    </form>
    <?php
    include("database_connect.php");


    if ($_POST) {
        $text = $_POST["product"];
        $request = "SELECT * FROM " . TABLE_NAME . " WHERE descripción LIKE " . "'" . '%' . $text . '%' . "'" . " ORDER by fecha DESC";
        if ($result = mysqli_query(connect(), $request)) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>" . " " . $row["importe"] . " " . $row["fecha"] . "</p>";
            }
        }
    }

    mysqli_close(connect());
    ?>
</body>

</html>