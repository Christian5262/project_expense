<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Listado de productos de mas reciente a mas antiguo</h1>
    <a href="index.php"><button>Volver</button></a>
    <table>
        <tr>
            <th>Fecha</th>
            <th>Descripción</th>
            <th>Importe</th>
            <th>Categoria</th>
        </tr>
        <?php
        include("database_connect.php");
        include("functions_list.php");
        $request = "SELECT * FROM " . TABLE_NAME . " ORDER by fecha DESC";
        $data_base = connect();

        //Función que muestra una tabla con los gastos
        
        $result = queryProcess($data_base, $request);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $date = new DateTime($row["fecha"]);

                echo "<tr>" .
                    "<form action='modify.php' method>" .
                    "<td>" . date_format($date, 'd-m-Y') . "</td>" .
                    "<td>" . $row["descripción"] . "</td>" .
                    "<td>" . $row["importe"] . "</td>" .
                    "<td>" . $row["categoria"] . "</td>" .
                    "<td>" . "<form action='modify.php' method='get'><input type='submit' name='categoria' value=" . "'" . $row["categoria"] . "'" . ">Modificar</form>" . "</td>" .
                    "</form>" .
                    "</tr>";
            }
            mysqli_free_result($result);
        }



        mysqli_close($data_base); //Metodo para cerrar la base de datos una vez hecho el pedido
        
        ?>

    </table>



</body>

</html>