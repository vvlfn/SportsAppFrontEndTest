<?php

require_once("../database.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $TeamName = $_POST["Name"];

    $conn = connect($servername, $username, $password, $database);

    createTeam($conn, $TeamName);

    $conn->close();

    header("location: ../teams.php");
}

else {
    header("location: ../index.php");
}
