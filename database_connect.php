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




?>