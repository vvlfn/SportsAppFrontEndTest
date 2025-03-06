<?php

require_once('database.php');

$CompID = $_GET['CompID'];

$conn = connect($servername, $username, $password, $database);

$result = getAllTeams($conn);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zawodnicy</title>
</head>
<body>

<a href="show_competition.php?CompID=<?=$CompID?>">Wróć</a>

<table>
    <tr>
        <th>Nazwa</th>
    </tr>

<?php while($row = $result->fetch_assoc()): ?>
    <?php

    if ($row['CompetitionID'] !== null) {
        continue;
    };

    ?>
    <tr>
        <td><?= $row['Name'] ?></td>
        <td><a href="logic/add_team_to_comp.php?TeamID=<?= $row['ID'] ?>&CompID=<?= $CompID ?>">Dodaj</a></td>
    </tr>
<?php endwhile ?>


</table>

</body>

<?php   

$conn->close();

?>

</html>