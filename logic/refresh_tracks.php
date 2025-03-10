<?php 

require_once("../database.php");

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $CompID = $_GET["CompID"];
    $CompName = $_GET["CompName"];

    $conn = connect($servername, $username, $password, $database);

    deleteTrackDB($conn, $CompName);

    $conn->close();

    header("location: ../generate_tracks.php?CompID=$CompID");
}

else {
    header("location: ../index.php");
}