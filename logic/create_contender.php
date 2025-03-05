<?php

require_once("../database.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $Class = $_POST["Class"];
    $Gender = $_POST["Gender"];
    $Status = $_POST["Status"];

    $conn = connect($servername, $username, $password, $database);

    createContender($conn, $FirstName, $LastName, $Class, $Gender, $Status);

    $conn->close();

    header("location: ../contenders.php");
}

else {
    header("location: ../index.php");
}
