<?php

require_once("../database.php");

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $ID = $_GET["ID"];

    $conn = connect($servername, $username, $password, $database);

    deleteContender($conn, $ID);

    $conn->close();

    header("location: ../contenders.php");
}

else {
    header("location: ../index.php");
}
