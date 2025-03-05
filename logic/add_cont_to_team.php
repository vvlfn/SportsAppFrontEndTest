<?php

require_once("../database.php");

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $ID = $_GET['ID'];
    $TeamID = $_GET['TeamID'];

    $conn = connect($servername, $username, $password, $database);

    addContenderToTeam($conn, $TeamID, $ID);

    $conn->close();

    header("location: ../add_team_contenders.php?TeamID=$TeamID");
}

else {
    header("location: ../index.php");
}
