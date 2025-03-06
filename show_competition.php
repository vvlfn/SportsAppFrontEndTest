<?php

session_start();

require_once('database.php');

$TeamIDs = [];

$CompID = $_GET["CompID"];

$conn = connect($servername, $username, $password, $database);

$result = getCompetitionTeams($conn, $CompID);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<a href="competitions.php">Wróć</a>

<h3>Drużyny uczestniczące</h3>
<table>
    <tr>
        <th>Nazwa</th>
    </tr>

<?php while($row = $result->fetch_assoc()): ?>

    <?php $TeamIDs[] = $row['ID'] ?>

    <tr>
        <td><?= $row['Name'] ?></td>
        <td><a href="logic/delete_from_competition.php?TeamID=<?= $row['ID'] ?>&CompID= <?= $CompID ?> ">Usuń z zawodów</a></td>
    </tr>
<?php endwhile ?>


</table>

<?php
$_SESSION['TeamIDs'] = $TeamIDs;
?>


<a href="add_comp_teams.php?CompID=<?= $CompID ?>">Dodaj drużynę</a><br>


<a href="generate_tracks.php?CompID=<?= $CompID ?>">Wygeneruj tory</a>
    
</body>
</html>