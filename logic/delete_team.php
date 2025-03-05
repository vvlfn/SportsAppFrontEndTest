<?php

require_once("../database.php");

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $ID = $_GET["TeamID"];

    $conn = connect($servername, $username, $password, $database);

    deleteTeam($conn, $ID);

    $conn->close();

    header("location: ../teams.php");
}

else {
    header("location: ../index.php");
}
