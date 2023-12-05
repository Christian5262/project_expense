<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Modificar Gasto</h1>
    <a href="list.php"><button>Volver</button></a>
    <?php
    include("functions_list.php");
    include("database_connect.php");
    if ($_GET) {
        $id = $_GET["categoria"];
    }

    $request = "SELECT * FROM gastos WHERE categoria= ?";
    $data_base = connect();
    // $prepare_query = mysqli_prepare($data_base, $request);
    // $row = searchExpense($prepare_query, $id);
    $result = prepareQuery($data_base, $request);

    if ($result) {
        mysqli_stmt_bind_param($result, 's', $id);
        if (mysqli_stmt_execute($result)) {
            $processing = mysqli_stmt_get_result($result);
            $row = mysqli_fetch_assoc($processing);
            if ($row) {
                echo "<form action='modify.php' method='post'>
            <label>Ingresa fecha<input type='date'name='date' value=" . $row["fecha"] . "></label>" .
                    "<label>Ingresa importe<input type='text' name='import' value=" . $row["importe"] . "></label>" .
                    "<label>Ingresa descripción<input type='text' name='description' value=" . "'" . $row["descripción"] . "'" . "></label>" .
                    "<label>Ingresa categoria (ocio o telefono) <input type='text' name='category' value=" . $row["categoria"] . "></label>" .
                    "<input type='hidden' name='old_category' value=" . $id . ">" .
                    "<input type='submit' value='Crear'> 
                </form>";
            }
        } else {
            echo "<h4>A al buscar el";
        }
        mysqli_stmt_close($result);
    } else {
        echo "A ocurrido un error";
    }


    if ($_POST) {
        $date = new DateTime($_POST["date"]);
        $dateFormat = date_format($date, 'Y-m-d');
        $import = $_POST["import"];
        $description = $_POST["description"];
        $category = $_POST["category"];
        $old_category = $_POST["old_category"];
        $requestUpdate = "UPDATE " . TABLE_NAME . " SET fecha=?, descripción=?, importe=?, categoria=? WHERE categoria=?";
        if ($result = mysqli_prepare($data_base, $requestUpdate)) {
            mysqli_stmt_bind_param($result, 'sssss', $dateFormat, $description, $import, $category, $old_category);
            if (mysqli_stmt_execute($result)) {
                echo "<h4>Gasto actualizado exitosamente</h4>";
            } else {
                echo "<h4>A ocurrido un error al actualizar el gasto";
            }
            mysqli_stmt_close($result);
        } else {
            echo "A ocurrido un error";
        }

    }

    mysqli_close($data_base);
    ?>

</body>

</html>