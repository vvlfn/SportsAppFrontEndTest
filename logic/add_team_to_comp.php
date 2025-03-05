<?php

require_once("../database.php");

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $TeamID = $_GET['TeamID'];
    $CompID = $_GET['CompID'];

    $conn = connect($servername, $username, $password, $database);

    addTeamToCompetition($conn, $CompID, $TeamID);

    $conn->close();

    header("location: ../add_comp_teams.php?CompID=$CompID");
}

else {
    header("location: ../index.php");
}
