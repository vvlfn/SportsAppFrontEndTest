<?php

require_once('database.php');

$conn = connect($servername, $username, $password, $database);

$result = getAllTeams($conn);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drużyny</title>
</head>
<body>

<a href="index.php">Wróć</a>

<table>
    <tr>
        <th>Nazwa Drużyny</th>
    </tr>

<?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['Name'] ?></td>
        <td><a href="team_contenders.php?TeamID=<?= $row['ID'] ?>">Zawodnicy</a></td>
        <td><a href="logic/delete_team.php?TeamID=<?= $row['ID'] ?>">Usuń</a></td>
    </tr>
<?php endwhile ?>

</table>
    
<a href="form/create_team_form.php">Stwórz Drużynę</a>

</body>

<?php   

$conn->close();

?>

</html>