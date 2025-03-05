<?php

require_once("../database.php");

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $TeamID = $_GET["TeamID"];
    $CompID = $_GET["CompID"];

    $conn = connect($servername, $username, $password, $database);

    deleteFromCompetition($conn, $TeamID);

    $conn->close();

    header("location: ../show_competition.php?CompID=$CompID");
}

else {
    header("location: ../index.php");
}
