<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'sportsappdb';

#CONNECTION WTIH SQL DATABASE
#-----------------------------------------------------------------------------

function connect($servername, $username, $password, $database) {
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed " . $conn->connect_error);
    }

    return $conn;
}

#GET FUNCTIONS
#-----------------------------------------------------------------------------

function getAllContenders($conn) {
    $sql = "SELECT * FROM Contenders";

    $result = $conn->query($sql);

    return $result;
}

function getAllTeams($conn) {
    $sql = "SELECT * FROM Teams";

    $result = $conn->query($sql);

    return $result;
}

function getAllCompetitions($conn) {
    $sql = "SELECT * FROM Competitions";

    $result = $conn->query($sql);

    return $result;
}

function getTeamContenders($conn, $ID) {
    $stmt = $conn->prepare("SELECT * FROM Contenders WHERE TeamID = ?");

    $stmt->bind_param("i", $ID);

    $stmt->execute();

    $result = $stmt->get_result();

    return $result;
}

function getTeamName($conn, $TeamID) {
    $stmt = $conn->prepare("SELECT Name FROM Teams WHERE ID = ?");

    $stmt->bind_param("i", $TeamID);

    $stmt->execute();

    $result = $stmt->get_result();

    $result = $result->fetch_assoc();

    if ($result === null) {
        return '-';
    }

    return $result["Name"];
}

function getCompetitionTeams($conn, $CompID) {
    $stmt = $conn->prepare("SELECT * FROM Teams WHERE CompetitionID = ?");

    $stmt->bind_param("i", $CompID);

    $stmt->execute();

    $result = $stmt->get_result();

    return $result;
}

function getTrackContenders($conn, $TeamIDs) {
    $TrackContenders = [];

    foreach ($TeamIDs as $TeamID) {
        $stmt = $conn->prepare("SELECT * FROM Contenders WHERE TeamID = ?");

        $stmt->bind_param("i", $TeamID);

        $stmt->execute();

        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $TrackContenders[] = $row;
        }
        
    }

    return $TrackContenders;
}

function getCompName($conn, $CompID) {
    $stmt = $conn->prepare("SELECT name FROM Competitions WHERE ID = ?");

    $stmt->bind_param("i", $CompID);

    $stmt->execute();

    $result = $stmt->get_result();

    $result = $result->fetch_assoc();

    return $result["name"];
}

function getTrackContendersDB($conn, $CompName) {
    $TrackDBName = $CompName . "_Tracks";

    $result = $conn->query("SELECT * FROM $TrackDBName");

    return $result;
}

#CREATE FUNCTIONS
#-----------------------------------------------------------------------------

function createContender($conn, $FirstName, $LastName, $Class, $Gender, $Status) {
    $stmt = $conn->prepare("INSERT INTO Contenders (FirstName, LastName, Class, Gender, Status) VALUES (?, ?, ?, ?, ?)");

    $stmt->bind_param("sssss", $FirstName, $LastName, $Class, $Gender, $Status);

    $stmt->execute();
}

function createTeam($conn, $Name) {
    $stmt = $conn->prepare("INSERT INTO Teams (Name) VALUES (?)");

    $stmt->bind_param("s", $Name);

    $stmt->execute();
}

function createCompetition($conn, $Name) {
    $stmt = $conn->prepare("INSERT INTO Competitions (Name) VALUES (?)");

    $stmt->bind_param("s", $Name);

    $stmt->execute();
}

function createTrackDB($conn, $CompName) {
    $TrackDBName = $CompName . "_Tracks";

    $result = $conn->query("CREATE TABLE $TrackDBName (
                            Track INT,
                            FirstName VARCHAR(50),
                            LastName VARCHAR(50),
                            Class VARCHAR(3))
                            ");
} 

#DELETE FUNCTIONS
#-----------------------------------------------------------------------------

function deleteContender($conn, $ID) {
    $stmt = $conn->prepare("DELETE FROM Contenders WHERE ID = ?");

    $stmt->bind_param("i", $ID);

    $stmt->execute();
}

function deleteTeam($conn, $ID) {
    $stmt = $conn->prepare("DELETE FROM Teams WHERE ID = ?");

    $stmt->bind_param("i", $ID);

    $stmt->execute();
}

function deleteCompetition($conn, $ID) {
    $stmt = $conn->prepare("DELETE FROM Competitions WHERE ID = ?");

    $stmt->bind_param("i", $ID);

    $stmt->execute();
}

function deleteFromTeam($conn, $ID) {
    $stmt = $conn->prepare("UPDATE Contenders SET TeamID = null WHERE ID = ?");

    $stmt->bind_param("i", $ID);

    $stmt->execute();
}

function deleteFromCompetition($conn, $TeamID) {
    $stmt = $conn->prepare("UPDATE Teams SET CompetitionID = null WHERE ID = ?");

    $stmt->bind_param("i", $TeamID);

    $stmt->execute();
}

function deleteTrackDB($conn, $CompName) {
    $TrackDBName = $CompName . "_Tracks";

    $result = $conn->query("DROP TABLE $TrackDBName");
}

#ADD METHODS
#-----------------------------------------------------------------------------

function addContenderToTeam($conn, $TeamID, $ID) {
    $stmt = $conn->prepare("UPDATE Contenders SET TeamID = ? WHERE ID = ?");

    $stmt->bind_param("ii", $TeamID, $ID);

    $stmt->execute();
}

function addTeamToCompetition($conn, $CompID, $TeamID) {
    $stmt = $conn->prepare("UPDATE Teams SET CompetitionID = ? WHERE ID = ?");

    $stmt->bind_param("ii", $CompID, $TeamID);

    $stmt->execute();
}

function addTrack($conn, $CompName, $track, $firstName, $lastName, $class) {
    $TrackDBName = $CompName . "_Tracks";

    $stmt = $conn->prepare("INSERT INTO $TrackDBName (Track, FirstName, LastName, Class)
                            VALUES (?, ?, ?, ?)");

    $stmt->bind_param("isss", $track, $firstName, $lastName, $class);

    $stmt->execute();
}

#OTHER METHODS
#-----------------------------------------------------------------------------

function checkIfTrackDBExists($conn, $CompName) {
    $TrackDBName = $CompName . "_Tracks";

    $result = $conn->query("SHOW TABLES LIKE '{$TrackDBName}'");

    if ($result->num_rows == 1) {
        return true;
    }
    else {
        return false;
    }
}