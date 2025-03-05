<?php

require_once("../database.php");

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $ID = $_GET["ID"];

    $conn = connect($servername, $username, $password, $database);

    deleteCompetition($conn, $ID);

    $conn->close();

    header("location: ../competitions.php");
}

else {
    header("location: ../index.php");
}
