<?php

require_once('database.php');

$TeamID = $_GET["TeamID"];

$conn = connect($servername, $username, $password, $database);

$result = getTeamContenders($conn, $TeamID);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<a href="teams.php">Wróć</a>

<table>
    <tr>
        <th>Imie</th>
        <th>Nazwisko</th>
        <th>Klasa</th>
        <th>Płeć</th>
        <th>Status</th>
        <th>Drużyna</th>
    </tr>

<?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['FirstName'] ?></td>
        <td><?= $row['LastName'] ?></td>
        <td><?= $row['Class'] ?></td>
        <td><?= $row['Gender'] ?></td>
        <td><?= $row['Status'] ?></td>
        <td><?= getTeamName($conn, $row['TeamID']) ?></td>
        <td><a href="logic/delete_from_team.php?ID=<?= $row['ID'] ?>&TeamID=<?= $TeamID ?> ">Usuń z drużyny</a></td>
    </tr>
<?php endwhile ?>


</table>

<a href="add_team_contenders.php?TeamID=<?= $TeamID ?>">Dodaj zawodnika</a>
    
</body>
</html>