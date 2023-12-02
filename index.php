<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    include("database_connect.php");



    $request = "SELECT importe FROM " . TABLE_NAME . " ORDER by fecha DESC";
    $count = 0;

    if ($result = mysqli_query(connect(), $request)) {
        while ($row = mysqli_fetch_assoc($result)) { {
                ++$count;
            }
        }
    }

    echo "<h1>Bienvenido a mi contabilidad doméstica. Actualmente hay $count anotaciones</h2>";

    mysqli_close(connect());


    ?>
    <a href="list.php"><button>Ir a ver listado de gastos </button></a>
    <a href="new.php"><button>Crear nuevo gasto</button></a>
    <a href="search.php"><button>Ir a buscar gasto</button></a>
</body>

</html>