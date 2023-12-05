<?php

function queryProcess($database, $sqlQuery)
{


    if ($result = mysqli_query($database, $sqlQuery)) {

        return $result;
    }
}

function prepareQuery($conn, $request)
{
    $result = mysqli_prepare($conn, $request);
    return $result;
}



function searchExpense($stmt, $id)
{

    $result = mysqli_stmt_bind_param($stmt, "s", $id);
    if ($result) {
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

}

function modifyExpense($sqlQuery, $expenseId)
{

}

?>