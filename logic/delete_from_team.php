<?php

require_once("../database.php");

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $ID = $_GET["ID"];
    $TeamID = $_GET["TeamID"];

    $conn = connect($servername, $username, $password, $database);

    deleteFromTeam($conn, $ID);

    $conn->close();

    header("location: ../team_contenders.php?TeamID=$TeamID");
}

else {
    header("location: ../index.php");
}
