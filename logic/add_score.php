<?php

require_once("../database.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $ContenderID = $_GET["ContenderID"];
    $CompID = $_GET["CompID"];
    $score = $_POST["score"];
    $tour = $_GET["Tour"];

    $conn = connect($servername, $username, $password, $database);

    addScore($conn, $score, $ContenderID, $CompID, $tour);

    $conn->close();

    header("location: ../generate_tracks.php?CompID=$CompID");
}

else {
    header("location: ../index.php");
}
