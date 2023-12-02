<?php

define("DB_HOST", "localhost");
define("DB_NAME", "contab");
define("DB_USERNAME", "christianvm");
define("DB_PASSWORD", "123456");
define("TABLE_NAME", "gastos");


function connect()
{
    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if (mysqli_connect_errno()) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}
function showList($sqlQuery)
{
    if ($result = mysqli_query(connect(), $sqlQuery)) {

        while ($row = mysqli_fetch_assoc($result)) {

            echo "<tr>" .
                "<td>" . $row["fecha"] . "</td>" .
                "<td>" . $row["descripción"] . "</td>" .
                "<td>" . $row["importe"] . "</td>" .
                "<td>" . $row["categoria"] . "</td>" .
                "</tr>";
        }
    }
    mysqli_free_result($result);
}



?>