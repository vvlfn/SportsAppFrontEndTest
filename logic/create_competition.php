<?php

require_once("../database.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $CompName = $_POST["Name"];

    $conn = connect($servername, $username, $password, $database);

    createCompetition($conn, $CompName);

    $conn->close();

    header("location: ../competitions.php");
}

else {
    header("location: ../index.php");
}
