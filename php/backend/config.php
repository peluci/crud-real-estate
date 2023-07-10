<?php
//Connection functions
function startConnection()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "1234";
    $db = "imobiliaria_db";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

    return $conn;
}

function endConnection($conn)
{
    $conn->close();
}
?>