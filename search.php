<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Buscar productos</h1>
    <a href="index.php"><button>Volver</button></a>
    <form action="search.php" method="post">
        <input type="text" name="product" id="">
        <input type="submit" value="Buscar">
    </form>
    <?php
    include("database_connect.php");
    $data_base = connect();

    if ($_POST) {
        $text = $_POST["product"];
        $request = "SELECT * FROM " . TABLE_NAME . " WHERE descripción LIKE " . "'" . '%' . $text . '%' . "'" . " ORDER by fecha DESC";
        if ($result = mysqli_query($data_base, $request)) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>" . " " . $row["importe"] . " " . $row["fecha"] . "</p>";
            }
        }
    }

    mysqli_close($data_base);
    ?>
</body>

</html>