<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Crear nuevo gasto</h1>
    <form action="new.php" method="post">
        <label for="">Ingresa fecha<input type="date" name="date"></label>
        <label for="">Ingresa importe<input type="text" name="import"></label>
        <label for="">Ingresa descripción<input type="text" name="description"></label>
        <label for="">Ingresa categoria (ocio o telefono) <input type="text" name="category"></label>
        <input type="submit" value="Crear">
    </form>

    <?php

    include("database_connect.php");

    if ($_POST) {

        $date = new DateTime($_POST["date"]);
        $dateFormat = date_format($date, 'Y-m-d');
        $import = $_POST["import"];
        $description = $_POST["description"];
        $category = $_POST["category"];
        $request = "INSERT INTO " . TABLE_NAME . " VALUES (?, ?, ?, ?)";

        if ($result = mysqli_prepare(connect(), $request)) {
            mysqli_stmt_bind_param($result, 'ssss', $dateFormat, $description, $import, $category);
            if (mysqli_stmt_execute($result)) {
                echo "<h4>Gasto creado exitosamente</h4>";
            } else {
                echo "<h4>A ocurrido un error al crear el gasto";
            }
            mysqli_stmt_close($result);
        } else {
            echo "A ocurrido un error";
        }

    }


    mysqli_close(connect());


    ?>

</body>

</html>