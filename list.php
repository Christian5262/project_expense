<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Listado de productos de mas reciente a mas antiguo</h1>
    <table>
        <tr>
            <th>Fecha</th>
            <th>Descripción</th>
            <th>Importe</th>
            <th>Categoria</th>
        </tr>
        <?php
        include("database_connect.php");
        $request = "SELECT * FROM " . TABLE_NAME . " ORDER by fecha DESC";

        //Función que muestra una tabla con los gastos
        echo showList($request);



        mysqli_close(connect()); //Metodo para cerrar la base de datos una vez hecho el pedido
        
        ?>

    </table>



</body>

</html>